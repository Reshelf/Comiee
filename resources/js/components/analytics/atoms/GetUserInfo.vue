<script>
import {
    checkNewUser,
    getLocationInfo,
    getSessionDuration,
    getTrafficSource,
    getUserDeviceInfo,
    submitAnalyticsData,
} from "@/common/atoms/UserAnalytics";

export default {
    props: {
        endpoint: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            isNewUser: false,
            deviceInfo: {},
            locationInfo: {},
            sessionDuration: 0,
            trafficSource: "",
        };
    },
    async mounted() {
        this.isNewUser = checkNewUser();
        this.deviceInfo = getUserDeviceInfo();
        this.locationInfo = await getLocationInfo();
        this.sessionDuration = getSessionDuration();
        this.trafficSource = getTrafficSource();

        await submitAnalyticsData(this.endpoint, {
            isNewUser: this.isNewUser,
            deviceInfo: this.deviceInfo,
            locationInfo: this.locationInfo,
            sessionDuration: this.sessionDuration,
            trafficSource: this.trafficSource,
        });
    },
};
</script>
