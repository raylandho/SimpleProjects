// Constants
k = 0.1; // spring constant in N/m
m = 1; // mass in kg
b = 0.02; // damping coefficient in Ns/m
x0 = 20; // initial displacement in m
const v0 = 0; // initial velocity in m/s
const omega = Math.sqrt(k / m); // angular frequency
let A = x0; // amplitude

// Variables
let x = x0;
let v = v0;
let t = 0;
const dt = 0.1; // time step
const positionCanvas = document.getElementById('positionCanvas');
const positionCtx = positionCanvas.getContext('2d');
const massCanvas = document.getElementById('massCanvas');
const massCtx = massCanvas.getContext('2d');
const positionGraphScale = 5;
const springWidth = 10;
const springColor = 'black';
const wallPosition = 50; // x-coordinate of the wall
let isRunning = false;

function update() {
    if(b != 0){
        // Calculate acceleration
        const a = (-k * x - b * v) / m;

        // Update position and velocity using Euler's method
        v += a * dt;
        x += v * dt;

        // Draw position-time graph
        positionCtx.beginPath();
        positionCtx.fillStyle = 'black';
        positionCtx.arc(t * positionGraphScale, positionCanvas.height / 2 - x / 2, 2, 0, 2 * Math.PI);
        positionCtx.fill();

        // Draw spring
        const springStartX = wallPosition;
        const springStartY = massCanvas.height / 2;
        const springEndX = massCanvas.width / 2 + x;
        const springEndY = massCanvas.height / 2;
        const numSpringSegments = Math.ceil(Math.abs(springStartX - springEndX) / springWidth);
        const springSegmentLength = (springEndX - springStartX) / numSpringSegments;

        massCtx.clearRect(0, 0, massCanvas.width, massCanvas.height);
        massCtx.beginPath();
        massCtx.moveTo(springStartX, springStartY);
        for (let i = 0; i < numSpringSegments; i++) {
            const segmentX = springStartX + i * springSegmentLength;
            const segmentY = springStartY + (i % 2 === 0 ? springWidth : -springWidth);
            massCtx.lineTo(segmentX, segmentY);
        }
        massCtx.lineTo(springEndX, springEndY);
        massCtx.strokeStyle = springColor;
        massCtx.lineWidth = 2;
        massCtx.stroke();

        // Update time
        t += dt;

        // Request next frame
        if (isRunning) {
            document.getElementById("Time").textContent = "Time: " + t.toFixed(2) + "s";
            document.getElementById("Velocity").textContent = "Velocity: " + v.toFixed(2) + "m/s";
            document.getElementById("Position").textContent = "Position: " + x.toFixed(2) + "m";
            requestAnimationFrame(update);
        }
    }
    else{
        // Update position and velocity
        v += (-k * x / m) * dt;
        x += v * dt;

        // Draw position-time graph
        positionCtx.beginPath();
        positionCtx.fillStyle = 'black';
        positionCtx.arc(t * positionGraphScale, positionCanvas.height / 2 - x / 2, 2, 0, 2 * Math.PI);
        positionCtx.fill();

        // Draw spring
        const springStartX = wallPosition;
        const springStartY = massCanvas.height / 2;
        const springEndX = massCanvas.width / 2 + x;
        const springEndY = massCanvas.height / 2;
        const numSpringSegments = Math.ceil(Math.abs(springStartX - springEndX) / springWidth);
        const springSegmentLength = (springEndX - springStartX) / numSpringSegments;

        massCtx.clearRect(0, 0, massCanvas.width, massCanvas.height);
        massCtx.beginPath();
        massCtx.moveTo(springStartX, springStartY);
        for (let i = 0; i < numSpringSegments; i++) {
            const segmentX = springStartX + i * springSegmentLength;
            const segmentY = springStartY + (i % 2 === 0 ? springWidth : -springWidth);
            massCtx.lineTo(segmentX, segmentY);
        }
        massCtx.lineTo(springEndX, springEndY);
        massCtx.strokeStyle = springColor;
        massCtx.lineWidth = 2;
        massCtx.stroke();

        // Update time
        t += dt;

        // Request next frame
        if (isRunning) {
            document.getElementById("Time").textContent = "Time: " + t.toFixed(2) + "s";
            document.getElementById("Velocity").textContent = "Velocity: " + v.toFixed(2) + "m/s";
            document.getElementById("Position").textContent = "Position: " + x.toFixed(2) + "m";
            requestAnimationFrame(update);
        }
    }
}

// Start simulation
const startButton = document.getElementById('startButton');
startButton.addEventListener('click', () => {
if (!isRunning) {
    isRunning = true;
    update();
}
});

// Stop simulation
const stopButton = document.getElementById('stopButton');
stopButton.addEventListener('click', () => {
    isRunning = false;
});

// Clear screen
const clearButton = document.getElementById('clearButton');
clearButton.addEventListener('click', () => {
positionCtx.clearRect(0, 0, positionCanvas.width, positionCanvas.height);
massCtx.clearRect(0, 0, massCanvas.width, massCanvas.height);
t = 0;
x = x0;
v = v0;
});

//form fixing
document.querySelector('form').addEventListener('submit', function(e){
    e.preventDefault();
    k = document.getElementById('k').value;
    m = document.getElementById('m').value;
    b = document.getElementById('b').value;
    x = x0 = parseFloat(document.getElementById('x0').value);
});