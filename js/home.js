const apiKey = "3c0d4e736b324dafaab4024e3c41ef62";
const url = "https://newsapi.org/v2/everything?q=";

function reload() {
  window.location.reload();
}

window.addEventListener("load", () => fetchNews("india"));

async function fetchNews(query) {
  const res = await fetch(`${url}${query}&sortBy=popularity&apiKey=${apiKey}`);
  const data = await res.json();
  bindData(data.articles);
}

function bindData(articles) {
  const newsBoxes = document.getElementById("news-boxes");
  const newsTemp = document.getElementById("news-template");
  newsBoxes.innerHTML = "";

  articles.forEach((article) => {
    if (!article.urlToImage) return;
    const boxClone = newsTemp.content.cloneNode(true);
    fillData(boxClone, article);
    newsBoxes.appendChild(boxClone);
  });
}

function fillData(boxClone, article) {
  const newsImg = boxClone.querySelector("#news-img");
  const newsTitle = boxClone.querySelector("#news-title");
  const newsSrc = boxClone.querySelector("#news-src");
  // const newsDesc = boxClone.querySelector("#news-desc");

  newsImg.src = article.urlToImage;
  newsTitle.innerHTML = article.title;
  const newsDate = new Date(article.publishedAt).toLocaleString();
  newsSrc.innerHTML = article.source.name + "<br> - " + newsDate;
  // newsDesc.innerHTML = article.description;

  boxClone.firstElementChild.addEventListener("click", () => {
    window.open(article.url, "_blank");
  });
}

let curNav = null;
function onNavClick(id) {
  fetchNews(id);

  curNav?.classList.remove("active");
  curNav = document.getElementById(id);
  curNav.classList.add("active");
}

const searchBtn = document.getElementById("search-btn");
searchBtn.addEventListener("click", () => {
  const searchKey = document.getElementById("search-box").value;
  fetchNews(searchKey);
  curNav?.classList.remove("active");
  curNav = null;
});
