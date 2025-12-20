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

document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('addMatakuliahBtn').addEventListener('click', function() {
        document.getElementById('matakuliah').classList.remove('active');
        document.getElementById('add-matakuliah').classList.add('active');
    });

    document.querySelectorAll('.ks-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const baris = this.closest('tr');
            
            const kodeMatakuliah = baris.querySelector('td:nth-child(2)').textContent;
            const namaMatakuliah = baris.querySelector('td:nth-child(3)').textContent;
            const sksA = baris.querySelector('td:nth-child(4)').textContent;
            const sksB = baris.querySelector('td:nth-child(5)').textContent;
            
            document.getElementById('matakuliah').classList.remove('active');
            document.getElementById('edit-matakuliah').classList.add('active');
            
            const editForm = document.getElementById('edit-matakuliah');
                if (editForm) {
                    editForm.querySelector('#kode_matakuliah').value = kodeMatakuliah;
                    editForm.querySelector('#nama_matakuliah').value = namaMatakuliah;
                    editForm.querySelector('#sks_a').value = sksA;
                    editForm.querySelector('#sks_b').value = sksB;
                }
        });
    });

});

document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('addKelasBtn').addEventListener('click', function() {
        document.getElementById('kelas').classList.remove('active');
        document.getElementById('add-kelas').classList.add('active');
    });


    document.querySelectorAll('.presence-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            
            const idKelas = this.getAttribute('id_kelas');
            const kodeMatakuliah = this.getAttribute('kode_matakuliah');
            const kodeDosen = this.getAttribute('kode_dosen');
            const hariWaktu = this.getAttribute('hari_waktu');
            const ruangan = this.getAttribute('ruangan');
            
            document.getElementById('kelas').classList.remove('active');
            document.getElementById('edit-kelas').classList.add('active');
            
            const editForm = document.getElementById('edit-kelas');
                if (editForm) {
                    editForm.querySelector('#id_kelas').value = idKelas;
                    editForm.querySelector('#kode_matakuliah').value = kodeMatakuliah;
                    editForm.querySelector('#kode_dosen').value = kodeDosen;
                    editForm.querySelector('#hari_waktu').value = hariWaktu;
                    editForm.querySelector('#ruangan').value = ruangan;
                }
        });
    });
});
