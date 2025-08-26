# Testing

- Framework: `PHPUnit`
- Location: `tests/`
- To run locally (assuming Composer is set up with `PHPUnit`):
  - `./vendor/bin/phpunit`
  - `phpunit` (if installed globally)
- The `LoginPageHtmlTest` includes each test in a separate PHP process using the `@runInSeparateProcess` annotation because the login page invokes:
  - `session_start()`
  - `header()` calls (`Refresh`), and outputs HTML
- The test attempts to locate the login page at these paths (the first match is used):
  - `login.php`, `public/login.php`, `app/login.php`, `src/login.php`, `tests/LoginPageTest.php`
Adjust the path list in `LoginPageHtmlTest::includeLoginPage()` if your file lives elsewhere.