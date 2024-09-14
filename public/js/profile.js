function openModal() {
    document.getElementById("myModal").style.display = "block";
}
  
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

document.addEventListener('DOMContentLoaded', (event) => {
    const editClick = document.getElementById('editPict');
    const bannerProf = document.querySelector('.picture-container');

    editClick.addEventListener('mouseenter', () => {
        bannerProf.classList.add('box-shadow');
    });

    editClick.addEventListener('mouseleave', () => {
        bannerProf.classList.remove('box-shadow');
    });
});