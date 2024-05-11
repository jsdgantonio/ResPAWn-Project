document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    // Check if username and password are correct (replace with your actual validation logic)
    if (username === 'admin' && password === 'adminpassword') {
      // Redirect to admin dashboard or perform any other admin-specific tasks
      window.location.href = 'admin_dashboard.html'; // Redirect to admin dashboard page
    } else {
      // Show error message
      document.getElementById('error-message').textContent = 'Invalid username or password';
    }
  });
  