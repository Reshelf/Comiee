declare global {
    interface Window {
        csrf_token: string;
        userData: any;
    }
}

export {};
