<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconocimiento Facial</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/face-landmarks-detection"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #video {
            width: 720px;
            height: 560px;
            position: relative; /* Asegurar que el canvas se superponga correctamente */
        }
        #canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1; /* Asegurar que el canvas esté por encima del video */
        }
    </style>
</head>
<body>
    <video id="video" autoplay playsinline></video>
    <canvas id="canvas"></canvas>

    <script>
        $(document).ready(function () {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const ctx = canvas.getContext('2d');

            // Función para iniciar la cámara
            async function startCamera() {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                    video.srcObject = stream;
                    console.log("Cámara iniciada correctamente.");
                } catch (error) {
                    console.error("Error al iniciar la cámara: ", error);
                }
            }

            // Función para detectar rostros y dibujar en el canvas
            async function detectFace() {
                const model = await faceLandmarksDetection.load(
                    faceLandmarksDetection.SupportedPackages.mediapipeFacemesh
                );
                
                setInterval(async () => {
                    if(video.readyState !== 4) return;

                    const predictions = await model.estimateFaces({input:video});
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    canvas.width = video.videoWidth; // Establecer el ancho del canvas al ancho del video
                    canvas.height = video.videoHeight; // Establecer la altura del canvas al alto del video
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                    predictions.forEach(prediction => {
                        const keypoints = prediction.scaledMesh;
                        for (let i = 0; i < keypoints.length; i++) {
                            const x = keypoints[i][0];
                            const y = keypoints[i][1];

                            ctx.beginPath();
                            ctx.arc(x, y, 1, 0, 2 * Math.PI);
                            ctx.fillStyle = 'red';
                            ctx.fill();
                        }
                    });
                }, 100);
            }

            startCamera();
            detectFace();
        });
    </script>
</body>
</html>






