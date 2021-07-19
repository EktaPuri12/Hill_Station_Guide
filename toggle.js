const togglepassword = document.getElementById('togglepassword');
const togglepassword1 = document.getElementById('togglepassword1');
const password = document.getElementById('Password');
togglepassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    if(type==='text')
    {
      this.style["display"]="none";
      togglepassword1.style["display"]="block";

    }

});
togglepassword1.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    if(type==='password')
    {
      togglepassword.style["display"]="block";
      togglepassword1.style["display"]="none";

    }

});