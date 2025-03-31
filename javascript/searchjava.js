document.addEventListener("DOMContentLoaded", function () {
    const searchBox = document.getElementById("search-box");
    const serviceContainers = document.querySelectorAll(".container .box");
  
    searchBox.addEventListener("input", function () {
      const searchText = searchBox.value.toLowerCase();
  
      serviceContainers.forEach(function (container) {
        const title = container.querySelector("h2").textContent.toLowerCase();
        const description = container.querySelector("p").textContent.toLowerCase();
  
        if (title.includes(searchText) || description.includes(searchText)) {
          container.style.display = "block";
        } else {
          container.style.display = "none";
        }
      });
    });
  });
  