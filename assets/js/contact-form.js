$(document).ready(function () {
  // Contact Form Validation and AJAX Submission
  $("#contact-form").on("submit", function (e) {
    e.preventDefault();

    const firstName = $("#firstName").val() ? $("#firstName").val().trim() : "";
    const lastName = $("#lastName").val() ? $("#lastName").val().trim() : "";
    const name = firstName + " " + lastName;
    const email = $("#email").val() ? $("#email").val().trim() : "";
    const subject = $("#subject").val() ? $("#subject").val() : "";
    const message = $("#message").val() ? $("#message").val().trim() : "";

    // Client-side validation
    if (!firstName || !email || !subject || !message) {
      Swal.fire({
        icon: "error",
        title: "Missing Information",
        text: "Please fill in all required fields.",
        confirmButtonColor: "#000",
      });
      return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      Swal.fire({
        icon: "error",
        title: "Invalid Email",
        text: "Please enter a valid email address.",
        confirmButtonColor: "#000",
      });
      return;
    }

    // Show loading
    Swal.fire({
      title: "Sending...",
      text: "Please wait while we send your message.",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });

    // AJAX submission
    $.ajax({
      url: "actions/process-contact.php",
      type: "POST",
      data: {
        name: name.trim(),
        email: email,
        subject: subject,
        message: message,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Message Sent!",
            html:
              "Thank you for contacting us.<br>" +
              "<strong>Confirmation emails have been sent to:</strong><br>" +
              "• Your email: <strong>" +
              email +
              "</strong><br>" +
              "• Our team for processing<br><br>" +
              "We will respond within 24 hours.",
            confirmButtonColor: "#000",
          }).then(() => {
            $("#contact-form")[0].reset();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Sending Failed",
            text: response.message || "Something went wrong. Please try again.",
            confirmButtonColor: "#000",
          });
        }
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Server Error",
          text: "Unable to send your message. Please try again later or call us directly.",
          confirmButtonColor: "#000",
        });
      },
    });
  });
});
