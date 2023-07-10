document.getElementById("post-form").addEventListener("submit", function(event) {
  event.preventDefault();
  var postTitle = document.getElementById("post-title").value;
  var postContent = document.getElementById("post-content").value;
  
  var postItem = document.createElement("div");
  postItem.classList.add("post-item");
  
  var titleElement = document.createElement("h3");
  titleElement.textContent = postTitle;
  
  var contentElement = document.createElement("p");
  contentElement.textContent = postContent;
  
  postItem.appendChild(titleElement);
  postItem.appendChild(contentElement);
  
  var postList = document.getElementById("post-list");
  postList.appendChild(postItem);
  
  document.getElementById("post-title").value = "";
  document.getElementById("post-content").value = "";
});
