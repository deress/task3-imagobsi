<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4 text-primary">Submit Your Feedback</h2>

    <!-- Form Feedback -->
    <form id="feedbackForm" class="card shadow-sm p-4 mb-4">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label for="comment" class="form-label">Feedback</label>
        <textarea id="comment" class="form-control" placeholder="Write your feedback..." rows="3" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Feedback List -->
    <h3 class="mb-3">All Feedbacks</h3>
    <div id="feedbackList" class="list-group"></div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const form = document.getElementById("feedbackForm");
    const feedbackList = document.getElementById("feedbackList");
    const API_URL = "http://127.0.0.1:8000/api/feedback";

    // Load feedbacks
    async function loadFeedback() {
      const res = await fetch(API_URL);
      const data = await res.json();
      feedbackList.innerHTML = "";
      data.forEach(feedback => {
         // format created_at ke dd-mm-yyyy hh:mm
        const date = new Date(feedback.created_at);
        const formattedDateTime = date.toLocaleDateString("id-ID", {
          day: "2-digit",
          month: "2-digit",
          year: "numeric"
        }) + " " + date.toLocaleTimeString("id-ID", {
          hour: "2-digit",
          minute: "2-digit",
          hour12: false
        });
        const div = document.createElement("div");
        div.className = "list-group-item list-group-item-action mb-2 shadow-sm";;
        div.innerHTML = `
          <h5 class="mb-1">${feedback.name} <small class="text-muted">(${feedback.email})</small></h5>
          <p class="mb-1">${feedback.comment}</p>
          <small class="text-secondary">${formattedDateTime}</small>
        `;
        feedbackList.appendChild(div);
      });
    }

    // Submit form
    form.addEventListener("submit", async e => {
      e.preventDefault();
      const feedback = {
        name: document.getElementById("name").value.trim(),
        email: document.getElementById("email").value.trim(),
        comment: document.getElementById("comment").value.trim()
      };

      const res = await fetch(API_URL, {
        method: "POST",
        headers: { 
          "Content-Type": "application/json",
          "Accept": "application/json" 
        },
        body: JSON.stringify(feedback)
      });

      const result = await res.json();
      alert(result.message);
      form.reset();
      loadFeedback();
    });

    // Initial load
    loadFeedback();
  </script>
</body>
</html>