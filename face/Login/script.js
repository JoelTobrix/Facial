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




