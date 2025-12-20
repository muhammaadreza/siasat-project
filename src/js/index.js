const showSidebar = (toggleId, sidebarId, headerId, mainId) =>{
    const toggle = document.getElementById(toggleId),
    sidebar = document.getElementById(sidebarId),
    header = document.getElementById(headerId),
    main = document.getElementById(mainId)

    if(toggle && sidebar && header && main){
        toggle.addEventListener('click', ()=>{
            sidebar.classList.toggle('show-sidebar')
            header.classList.toggle('left-pd')
            main.classList.toggle('left-pd')
        })
    }
}
showSidebar('header-toggle','sidebar', 'header', 'main')

const sidebarLink = document.querySelectorAll('.sidebar__list a')
const pageContent = document.querySelectorAll('.page-section')

function changePage(e) {
    e.preventDefault()
    sidebarLink.forEach(l => l.classList.remove('active-link'))
    this.classList.add('active-link')
    pageContent.forEach(page => page.classList.remove('active'))
    const pageId = this.getAttribute('data-page')
    document.getElementById(pageId).classList.add('active')
}
sidebarLink.forEach(l => l.addEventListener('click', changePage))

const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'ri-sun-fill'

const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-fill'


if (selectedTheme) {
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'ri-moon-clear-fill' ? 'add' : 'remove'](iconTheme)
}

themeButton.addEventListener('click', () => {
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})

document.querySelector('.toggle-password-btn').addEventListener('click', function() {
    const passwordField = document.getElementById('passwordField');
    const passwordToggleIcon = document.getElementById('passwordToggleIcon');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        passwordToggleIcon.className = 'ri-eye-off-line';
    } else {
        passwordField.type = 'password';
        passwordToggleIcon.className = 'ri-eye-line';
    }
});

function updateDate() {
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    const now = new Date();
    const day = days[now.getDay()];
    const date = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();
    
    document.getElementById('current-date').textContent = `${day}, ${date} ${month} ${year}`;
}

document.addEventListener('DOMContentLoaded', updateDate);
