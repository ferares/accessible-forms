<header>
  <!-- Main navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Skip to content (useful for keyboard navigation) -->
    <a class="navbar-link mr-4" href="#main">
      Skip to content
    </a>
    <!-- Brand name and link to the home page -->
    <a class="navbar-brand" href="/">
      Accesible forms
    </a>
    <!-- Menu icon for mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-main">
      <ul class="navbar-nav mr-auto">
        <!-- Home page link -->
        <li class="nav-item active">
          <a class="nav-link" href="/">
            Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <!-- About modal link -->
        <li class="nav-item">
          <a class="nav-link" href="/about.html">
            About
          </a>
        </li>
        <!-- Dropdown with links to all the forms -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="forms-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Forms
          </a>
          <div class="dropdown-menu" aria-labelledby="forms-dropdown">
            <!-- Labeled form link -->
            <a class="dropdown-item" href="#labeled-form">
              Labeled form
            </a>
            <!-- Labelless form link -->
            <a class="dropdown-item" href="#labelless-form">
              Label-less form
            </a>
          </div>
        </li>
      </ul>
      <?php if ($nojs) : ?>
        <a class="nav-link p-0" href="/">
          Enable JavaScript
        </a>
      <?php else : ?>
        <a class="nav-link p-0" href="/?nojs">
          Disable JavaScript
        </a>
      <?php endif; ?>
    </div>
  </nav>
</header>
