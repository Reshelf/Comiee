export default class CountUp {
    constructor(endValue, duration = 700) {
        this.endValue = endValue;
        this.duration = duration;
    }

    start(callback) {
        const startTime = performance.now();

        const updateCounter = (time) => {
            const elapsedTime = time - startTime;
            const progress = Math.min(elapsedTime / this.duration, 1);
            const currentValue = Math.floor(progress * this.endValue);

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                callback(this.endValue);
            }

            callback(currentValue);
        };

        requestAnimationFrame(updateCounter);
    }
}
