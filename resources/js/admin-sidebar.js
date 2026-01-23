const sidebarShowButton = document.getElementById("sidebarShowButton");
const sidebarHideButton = document.getElementById("sidebarHideButton");
const sidebar = document.getElementById("sidebar");
const sidebarBackdrop = document.getElementById("sidebarBackdrop");

function showSidebar(sidebar, sidebarBackdrop) {
    sidebar.classList.add("show");
    sidebarBackdrop.classList.add("show");
} 

function hideSidebar(sidebar, sidebarBackdrop) {
    sidebar.classList.remove("show");
    sidebarBackdrop.classList.remove("show");
} 

sidebarShowButton.addEventListener("click", () => {
    showSidebar(sidebar, sidebarBackdrop);
});

sidebarHideButton.addEventListener("click", () => {
    hideSidebar(sidebar, sidebarBackdrop);
});

sidebarBackdrop.addEventListener("click", () => {
    hideSidebar(sidebar, sidebarBackdrop);
});
