document.getElementById('loginForm').addEventListener('submit', function (e) {
   const email = document.getElementById('email').value;
   const password = document.getElementById('password').value;
   const errorMessage = document.getElementById('error-message');

   // Clear previous error messages
   errorMessage.textContent = '';
   
   // Basic validation: Check if both fields are filled
   if (!email || !password) {
      errorMessage.textContent = 'Both fields are required.';
      e.preventDefault();  // Stop form submission
      return;
   }

   // Email format validation
   const emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
   if (!emailPattern.test(email)) {
      errorMessage.textContent = 'Please enter a valid email address.';
      e.preventDefault();  // Stop form submission
      return;
   }

   // Password length validation (at least 8 characters)
   if (password.length < 8) {
      errorMessage.textContent = 'Password must be at least 8 characters long.';
      e.preventDefault();  // Stop form submission
      return;
   }

   // You can add more password complexity checks here (e.g., including numbers, special characters, etc.)
});
