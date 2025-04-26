function hideIcons(inputElement) {
    const formOutline = inputElement.closest('.form-outline');
    const boxicon = formOutline.querySelector('box-icon');
    const img = formOutline.querySelector('img.icon');
  
    if (boxicon) boxicon.style.display = 'none';
    if (img) img.style.display = 'none';
  }
  
  function loginUser() {
    const email = document.getElementById('emailInput').value;
    const password = document.getElementById('passwordInput').value;
  
    // Use the correct URL to match your PHP file
    axios.post('index.php', {
      email: email,
      password: password
    })
    .then(response => {
      alert(response.data.message);
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Login failed.');
    });
  }
  
  function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const toggleEye = document.getElementById('toggleEye');
  
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleEye.setAttribute('name', 'eye-off');
    } else {
      passwordInput.type = 'password';
      toggleEye.setAttribute('name', 'eye');
    }
  }
  