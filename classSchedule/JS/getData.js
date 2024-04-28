document.addEventListener('DOMContentLoaded', function() {
    fetchUserCount().then(data => {
        displayUserCount(data.totalUsers);
    }).catch(error => {
        console.error('Error fetching user count:', error);
    });
});

async function fetchUserCount() {
    const response = await fetch('../PHP/dbdashboard3.php');
    const data = await response.json();
    return data;
}

function displayUserCount(count) {
    const userCountElement = document.getElementById('userCount');
    userCountElement.textContent = count;
}