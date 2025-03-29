<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cloud Services - Your Reliable Cloud Partner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">CloudServices</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#plans">Plans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Slider Section -->
  <div id="cloudSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#cloudSlider" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#cloudSlider" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#cloudSlider" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/cloud-banner1.webp" class="d-block w-100" alt="Cloud Services">
        <div class="carousel-caption">
          <h2>Welcome to Cloud Services</h2>
          <p>Your Trusted Partner in Cloud Solutions</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/cloud-banner2.webp" class="d-block w-100" alt="Cloud Infrastructure">
        <div class="carousel-caption">
          <h2>Secure Infrastructure</h2>
          <p>Enterprise-grade security for your business</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/cloud-banner3.jpg" class="d-block w-100" alt="Cloud Solutions">
        <div class="carousel-caption">
          <h2>Scalable Solutions</h2>
          <p>Grow your business with our flexible plans</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#cloudSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#cloudSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Plans Section -->
  <section id="plans" class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">Our Cloud Plans</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-header bg-primary text-white text-center">
              <h3>Basic</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title text-center">$29/month</h4>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success"></i> 2 CPU Cores</li>
                <li><i class="fas fa-check text-success"></i> 4GB RAM</li>
                <li><i class="fas fa-check text-success"></i> 100GB Storage</li>
                <li><i class="fas fa-check text-success"></i> 1TB Bandwidth</li>
              </ul>
              <a href="#" class="btn btn-primary d-block" data-bs-toggle="modal" data-bs-target="#leadModal">Get
                Started</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-header bg-success text-white text-center">
              <h3>Professional</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title text-center">$59/month</h4>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success"></i> 4 CPU Cores</li>
                <li><i class="fas fa-check text-success"></i> 8GB RAM</li>
                <li><i class="fas fa-check text-success"></i> 250GB Storage</li>
                <li><i class="fas fa-check text-success"></i> 2TB Bandwidth</li>
              </ul>
              <a href="#" class="btn btn-success d-block" data-bs-toggle="modal" data-bs-target="#leadModal">Get
                Started</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-header bg-info text-white text-center">
              <h3>Enterprise</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title text-center">$99/month</h4>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success"></i> 8 CPU Cores</li>
                <li><i class="fas fa-check text-success"></i> 16GB RAM</li>
                <li><i class="fas fa-check text-success"></i> 500GB Storage</li>
                <li><i class="fas fa-check text-success"></i> 5TB Bandwidth</li>
              </ul>
              <a href="#" class="btn btn-info d-block" data-bs-toggle="modal" data-bs-target="#leadModal">Get
                Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Lead Form Modal -->
  <div class="modal fade" id="leadModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Get Started with Cloud Services</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="leadForm" action="submit_lead.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
              <label for="plan_name" class="form-label">Plan Name</label>
              <select class="form-control" id="plan_name" name="plan_name" required>
                <option value="Basic">Basic</option>
                <option value="Professional">Professional</option>
                <option value="Enterprise">Enterprise</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5>Cloud Services</h5>
          <p>Your trusted partner in cloud solutions</p>
        </div>
        <div class="col-md-6 text-md-end">
          <h5>Contact Us</h5>
          <p>Email: info@cloudservices.com<br>
            Phone: +1 (555) 123-4567</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>