document.addEventListener('DOMContentLoaded', function() {
    Promise.all([fetchData('../PHP/dbdashboard.php'), fetchData('../PHP/dbdashboard2.php')])
        .then(([sectionData, otherData]) => {
            createCharts(sectionData, 'Section', 'Count', 'Section');
            createCharts(otherData, 'GradeLevel', 'Count', 'GradeLevel');
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});

async function fetchData(url) {
    const response = await fetch(url);
    const data = await response.json();
    return data;
}

function createCharts(data, labelKey, valueKey, title) {
    const container = document.getElementById('chartContainer');

    const card = document.createElement('div');
    card.className = 'card';
    container.appendChild(card);

    const ctx = document.createElement('canvas');
    card.appendChild(ctx);

    const labels = data.map(item => item[labelKey]);
    const values = data.map(item => item[valueKey]);
    const colors = generateRandomColors(values.length);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: title,
                data: values,
                backgroundColor: colors,
                borderColor: colors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function generateRandomColors(count) {
    const colors = [];

    for (let i = 0; i < count; i++) {
        colors.push(getRandomColor());
    }

    return colors;
}

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';

    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }

    return color;
}