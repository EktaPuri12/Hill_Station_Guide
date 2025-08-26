<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LoginPageHtmlTest extends TestCase
{
    /**
     * Include the login page and return [output, headers].
     * This helper starts output buffering, sets superglobals, includes the page,
     * and captures headers set via header().
     */
    private function includeLoginPage(array $get = [], array $post = []): array
    {
        // Backup superglobals
        $backupGet = $_GET ?? [];
        $backupPost = $_POST ?? [];

        $_GET = $get;
        $_POST = $post;

        ob_start();
        // Try to locate the login page. The snippet indicates the page is (or was) under tests/LoginPageTest.php
        // which seems incorrect for application code. We therefore attempt multiple common locations.
        $candidateFiles = [
            // Common app locations
            'login.php',
            'public/login.php',
            'app/login.php',
            'src/login.php',
            // The odd case: provided snippet shows application markup in tests/LoginPageTest.php
            'tests/LoginPageTest.php',
        ];

        $included = false;
        foreach ($candidateFiles as $file) {
            if (is_file($file)) {
                // Suppress warnings to keep test output clean, we'll assert on behavior instead
                @require $file;
                $included = true;
                break;
            }
        }
        $output = ob_get_clean();

        // Restore superglobals
        $_GET = $backupGet;
        $_POST = $backupPost;

        if (!$included) {
            $this->fail(
                "Could not locate the login page to include. " .
                "Tried: " . implode(', ', $candidateFiles) .
                ". Please ensure the login page file exists in one of these paths."
            );
        }

        // Collect headers (works under CLI for headers queued by header())
        $headers = function_exists('headers_list') ? headers_list() : [];

        return [$output, $headers];
    }

    /**
     * Basic smoke test: the HTML renders and contains key structural elements.
     * @runInSeparateProcess
     */
    public function test_renders_login_page_with_core_elements(): void
    {
        [$html] = $this->includeLoginPage();

        $this->assertNotEmpty($html, 'Expected login page to render some HTML.');

        // Basic sanity checks
        $this->assertStringContainsString('<form', $html);
        $this->assertStringContainsString('action="to_verify.php"', $html);
        $this->assertMatchesRegularExpression('/<form[^>]*method="POST"/i', $html);

        // Input fields
        $this->assertStringContainsString('name="user"', $html);
        $this->assertStringContainsString('name="Password"', $html);
        $this->assertMatchesRegularExpression('/<input[^>]+type="password"[^>]+id="Password"/i', $html);
        $this->assertStringContainsString('name="code"', $html);

        // Captcha image
        $this->assertStringContainsString('<img src="captcha.php"', $html);

        // Toggle icons
        $this->assertStringContainsString('id="togglepassword"', $html);
        $this->assertStringContainsString('id="togglepassword1"', $html);

        // Stylesheets and script
        $this->assertStringContainsString('style5.css', $html);
        $this->assertStringContainsString('style.css', $html);
        $this->assertStringContainsString('toggle.js', $html);

        // Title and heading
        $this->assertStringContainsString('<title> SIGN IN </title>', $html);
        $this->assertStringContainsString('Sign In!', $html);
    }

    /**
     * Validate cache-control meta tags are present to prevent caching.
     * @runInSeparateProcess
     */
    public function test_contains_no_cache_meta_tags(): void
    {
        [$html] = $this->includeLoginPage();

        $this->assertStringContainsString('http-equiv="cache-control"', $html);
        $this->assertStringContainsString('no-cache', $html);
        $this->assertStringContainsString('no-store', $html);
        $this->assertStringContainsString('must-revalidate', $html);

        $this->assertStringContainsString('http-equiv="pragma"', $html);
        $this->assertStringContainsString('http-equiv="expires"', $html);
    }

    /**
     * Parse the HTML and verify specific attributes using DOMDocument/XPath when available.
     * @runInSeparateProcess
     */
    public function test_form_structure_and_required_attributes(): void
    {
        [$html] = $this->includeLoginPage();

        if (!class_exists(\DOMDocument::class)) {
            $this->markTestSkipped('DOM extension not available; skipping structured HTML assertions.');
        }

        $dom = new \DOMDocument();
        // Suppress warnings due to HTML5 tags/attributes
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);

        // Form action and method
        $forms = $xpath->query("//form[@action='to_verify.php' and translate(@method, 'post', 'POST')='POST']");
        $this->assertGreaterThanOrEqual(1, $forms->length, 'Expected a POST form with action="to_verify.php".');

        // Required fields
        $user = $xpath->query("//input[@name='user' and @required]");
        $password = $xpath->query("//input[@name='Password' and @type='password' and @required]");
        $code = $xpath->query("//input[@name='code' and @required]");

        $this->assertGreaterThanOrEqual(1, $user->length, 'Expected required username input.');
        $this->assertGreaterThanOrEqual(1, $password->length, 'Expected required password input.');
        $this->assertGreaterThanOrEqual(1, $code->length, 'Expected required captcha code input.');
    }

    /**
     * When GET[id] is present, the page should echo the message and set a Refresh header to return to login.php.
     * @runInSeparateProcess
     */
    public function test_displays_message_and_sets_refresh_header_when_id_is_present(): void
    {
        [$html, $headers] = $this->includeLoginPage(['id' => 'Invalid Captcha Code']);

        $this->assertStringContainsString('Invalid Captcha Code', $html);

        $combined = strtolower(implode("\n", $headers));
        $this->assertStringContainsString('refresh:5;url=login.php', $combined, 'Expected Refresh header to be set for redirect.');
    }

    /**
     * Similar behavior for GET[id1].
     * @runInSeparateProcess
     */
    public function test_displays_message_and_sets_refresh_header_when_id1_is_present(): void
    {
        [$html, $headers] = $this->includeLoginPage(['id1' => 'Invalid Credentials']);

        $this->assertStringContainsString('Invalid Credentials', $html);

        $combined = strtolower(implode("\n", $headers));
        $this->assertStringContainsString('refresh:5;url=login.php', $combined);
    }

    /**
     * Similar behavior for GET[id2].
     * @runInSeparateProcess
     */
    public function test_displays_message_and_sets_refresh_header_when_id2_is_present(): void
    {
        [$html, $headers] = $this->includeLoginPage(['id2' => 'Session expired']);

        $this->assertStringContainsString('Session expired', $html);

        $combined = strtolower(implode("\n", $headers));
        $this->assertStringContainsString('refresh:5;url=login.php', $combined);
    }

    /**
     * When no GET message parameters are present, there should be no Refresh header set.
     * @runInSeparateProcess
     */
    public function test_no_refresh_header_when_no_message_params(): void
    {
        [, $headers] = $this->includeLoginPage();

        $combined = strtolower(implode("\n", $headers));
        $this->assertStringNotContainsString('refresh:5;url=login.php', $combined);
    }

    /**
     * Validate presence of navigation links.
     * @runInSeparateProcess
     */
    public function test_has_expected_navigation_links(): void
    {
        [$html] = $this->includeLoginPage();

        $this->assertStringContainsString('href="index.php"', $html);
        $this->assertStringContainsString('href="login.php"', $html);
        $this->assertStringContainsString('href="Sign_up.php"', $html);
    }
}