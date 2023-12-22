document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchValue = this.value.trim().toLowerCase();
        let content = document.getElementById('content');
        let regex = new RegExp(searchValue, 'gi');
        let contentHTML = content.innerHTML;

        // Highlight matching text by wrapping it in a <span> with a specific class
        let highlightedContent = contentHTML.replace(regex, match => `<span class="highlight">${match}</span>`);
        
        content.innerHTML = highlightedContent;
    });
});

