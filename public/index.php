<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITE_NAME; ?> - Cloud Services</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <!-- Carousel Section -->
  <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('/images/cloud-1.jpg')">
        <div class="carousel-content">
          <h2>Enterprise Cloud Solutions</h2>
          <p>Transform your business with our scalable and secure cloud infrastructure.</p>
          <button class="btn btn-primary" data-open-lead-form>Get Started</button>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/images/cloud-2.jpg')">
        <div class="carousel-content">
          <h2>Cloud Security</h2>
          <p>Protect your data with our advanced cloud security solutions.</p>
          <button class="btn btn-primary" data-open-lead-form>Learn More</button>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/images/cloud-3.jpg')">
        <div class="carousel-content">
          <h2>Cloud Migration</h2>
          <p>Seamlessly migrate your infrastructure to the cloud with our expert team.</p>
          <button class="btn btn-primary" data-open-lead-form>Contact Us</button>
        </div>
      </div>
    </div>
    <div class="carousel-controls">
      <button class="carousel-prev">❮</button>
      <button class="carousel-next">❯</button>
    </div>
  </div>

  <!-- Lead Form Modal -->
  <div class="lead-form-modal">
    <div class="lead-form">
      <button type="button" class="lead-form-close">×</button>
      <h3>Contact Us</h3>
      <div class="alert"></div>
      <form id="leadForm" action="/submit_lead.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="plan_name">Interested In</label>
          <select class="form-control" id="plan_name" name="plan_name" required>
            <option value="">Select a Service</option>
            <option value="Enterprise Cloud">Enterprise Cloud</option>
            <option value="Cloud Security">Cloud Security</option>
            <option value="Cloud Migration">Cloud Migration</option>
            <option value="Cloud Consulting">Cloud Consulting</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>
  </div>

  <script src="/js/main.js"></script>
</body>

</html>