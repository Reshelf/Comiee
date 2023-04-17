export function checkNewUser(): boolean {
    if (localStorage.getItem("user_first_visit") === null) {
        localStorage.setItem("user_first_visit", new Date().toString());
        return true;
    } else {
        return false;
    }
}

export function getDeviceType(userAgent: string): "mobile" | "desktop" {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        userAgent
    )
        ? "mobile"
        : "desktop";
}

export function getBrowser(userAgent: string): string {
    if (userAgent.indexOf("Chrome") > -1) return "Chrome";
    if (userAgent.indexOf("Safari") > -1) return "Safari";
    if (userAgent.indexOf("Firefox") > -1) return "Firefox";
    if (userAgent.indexOf("MSIE") > -1 || userAgent.indexOf("Trident/") > -1)
        return "Internet Explorer";
    if (userAgent.indexOf("Edge") > -1) return "Edge";
    return "unknown";
}

export function getOS(userAgent: string, platform: string): string {
    if (/Win/i.test(platform)) return "Windows";
    if (/Mac/i.test(platform)) return "MacOS";
    if (/Linux/i.test(platform)) return "Linux";
    if (/iPhone|iPad|iPod/i.test(platform)) return "iOS";
    if (/Android/i.test(userAgent)) return "Android";
    return "unknown";
}

export function getUserDeviceInfo(): {
    type: "mobile" | "desktop";
    browser: string;
    os: string;
} {
    const userAgent = window.navigator.userAgent;
    const platform = window.navigator.platform;

    return {
        type: getDeviceType(userAgent),
        browser: getBrowser(userAgent),
        os: getOS(userAgent, platform),
    };
}

export async function getLocationInfo(): Promise<{
    country?: string;
    city?: string;
}> {
    try {
        const response = await fetch("https://ipapi.co/json/");
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const locationData = await response.json();
        return {
            country: locationData.country_name,
            city: locationData.city,
        };
    } catch (error) {
        console.error("Error fetching location info:", error);
        return {};
    }
}

export function getSessionDuration(): number {
    const sessionStart = localStorage.getItem("session_start");
    if (sessionStart === null) {
        localStorage.setItem("session_start", new Date().toString());
        return 0;
    } else {
        const sessionStartTime = new Date(sessionStart);
        return Math.floor(
            (new Date().getTime() - sessionStartTime.getTime()) / 1000
        );
    }
}

function isFromSearchEngine(referrer: string): boolean {
    const searchEngines = [
        "google.com",
        "bing.com",
        "yahoo.com",
        "baidu.com",
        "yandex.com",
        "duckduckgo.com",
        "ask.com",
    ];
    const domain = new URL(referrer).hostname;
    return searchEngines.some((engine) => domain.includes(engine));
}

function isFromSocialMedia(referrer: string): boolean {
    const socialMedia = [
        "facebook.com",
        "twitter.com",
        "instagram.com",
        "linkedin.com",
        "pinterest.com",
        "youtube.com",
    ];
    const domain = new URL(referrer).hostname;
    return socialMedia.some((platform) => domain.includes(platform));
}
