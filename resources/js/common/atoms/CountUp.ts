export default class CountUp {
    private endValue: number;
    private duration: number;

    constructor(endValue: number, duration = 700) {
        this.endValue = endValue;
        this.duration = duration;
    }

    public start(callback: (value: number) => void): void {
        const startTime = performance.now();

        const updateCounter = (time: number) => {
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
