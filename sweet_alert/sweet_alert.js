
// Function to show SweetAlert and prevent modal from closing
// Function to show SweetAlert and handle redirection or refresh
function showSuccessAlert(message, redirectUrl = '') {
  Swal.fire({
      title: "Success!",
      text: message,
      icon: "success",
      confirmButtonText: "OK",
  }).then((result) => {
      if (result.isConfirmed) {
          if (redirectUrl) {
              window.location.href = redirectUrl; // Redirect to the specified URL
          } else {
              window.location.href = window.location.href; // Refresh the current page
          }
      }
  });
}


// function showSuccessAlert2(message, redirectUrl) {
//   Swal.fire({
//       title: "Success!",
//       text: message,
//       icon: "success",
//       confirmButtonText: "OK",
//   }).then((result) => {
//       if (result.isConfirmed) {
//           window.location.href = redirectUrl; // Redirect to the specified URL
//       }
//   });
// }


// Similar functions for other alert types
function showErrorAlert(message) {
  Swal.fire({
    title: "Error!",
    text: message,
    icon: "error",
    confirmButtonText: "OK",
  });
}

function showWarningAlert(message) {
  Swal.fire({
    title: "Warning!",
    text: message,
    icon: "warning",
    confirmButtonText: "OK",
  });
}

function showInfoAlert(message) {
  Swal.fire({
    title: "Information",
    text: message,
    icon: "info",
    confirmButtonText: "OK",
  });
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!DONT REMOVE BELOW CODE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!DONT REMOVE BELOW CODE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!DONT REMOVE BELOW CODE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//         $successMessage = "Hello, $name! Your operation was successful.";
//         echo "<script>showSuccessAlert('$successMessage');</script>";

//         $warningMessage = "This is a warning. Please be cautious.";
//         echo "<script>showWarningAlert('$warningMessage');</script>";

//         $errorMessage = "The name field is required.";
//         echo "<script>showErrorAlert('$errorMessage');</script>";

//         $infoMessage = "This is an informational alert!";
//         echo "<script>showInfoAlert('$infoMessage');</script>";
