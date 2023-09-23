<div class="d-flex justify-content-between align-items-center mb-5">
  <form class="input-group" method="GET" style="max-width: calc(var(--bs-breakpoint-sm) - 5rem);">
    <label class="sr-only" for="search">Search</label>
    <input type="search" id="search" class="form-control" name="search" placeholder="Search by name..." value="<?php echo $_GET['search'] ?? ''; ?>">
    <button type="submit" class="btn btn-primary" aria-label="Filter Search">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" aria-hidden="true">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg>
    </button>
    <?php if (!searchIsEmpty()) : ?>
      <a href="/" class="btn btn-outline-info">Clear Filters</a>
    <?php endif; ?>
  </form>
  <div class="d-flex gap-2 justify-content-start align-items-start flex-wrap">
    <a href="/tenants/create" class="btn btn-success d-flex justify-content-start align-items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16" aria-hidden="true">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
      Add new tenant
    </a>
    <form action="/export" method="POST">
      <input type="hidden" name="export" value="true">
      <input type="submit" value="Export List to CSV" class="btn btn-info">
    </form>
  </div>
</div>