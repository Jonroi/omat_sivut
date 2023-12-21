function search(event) {
  event.preventDefault(); // Prevent the form from submitting and refreshing the page

  // Get the search input value
  const searchInput = document.querySelector('input[type="search"]');
  const searchQuery = searchInput.value;

  // Perform the search functionality
  const matchingWords = performSearch(searchQuery);
  displaySearchResults(matchingWords);
}

function performSearch(query) {
  const pageContent = document.documentElement.innerText;
  const words = pageContent.split(/\s+/);
}