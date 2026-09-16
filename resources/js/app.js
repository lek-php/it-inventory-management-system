
// This function takes a date string as input and returns a human-readable string indicating how long ago that date was from the current time. It calculates the difference in seconds, minutes, hours, and days, and formats the output accordingly.
export const timeAgo = (date) => {
    const now = new Date();
    const past = new Date(date);

    const seconds = Math.floor((now - past) / 1000);

    if (seconds < 60) {
        return `${seconds} second${seconds !== 1 ? "s" : ""} ago`;
    }

    const minutes = Math.floor(seconds / 60);

    if (minutes < 60) {
        return `${minutes} minute${minutes !== 1 ? "s" : ""} ago`;
    }

    const hours = Math.floor(minutes / 60);

    if (hours < 24) {
        return `${hours} hour${hours !== 1 ? "s" : ""} ago`;
    }

    const days = Math.floor(hours / 24);

    return `${days} day${days !== 1 ? "s" : ""} ago`;
};

// This function takes a status string as input and returns a corresponding CSS class string that defines the background and text color for that status. It uses a switch statement to match the input status with predefined cases and returns the appropriate class string.
export const badge = (s) => {
    switch (s.toLowerCase()) {
        case "available":
            return "bg-green-100 text-green-700";

        case "assigned":
            return "bg-teal-100 text-teal-700";

        case "in repair":
            return "bg-yellow-100 text-yellow-700";

        case "for maintenance":
            return "bg-orange-100 text-orange-700";

        case "not good":
            return "bg-red-100 text-red-700";

        case "for disposal":
            return "bg-purple-100 text-purple-700";

        case "disposed":
            return "bg-gray-100 text-gray-600";

        default:
            return "bg-gray-100 text-gray-700";
    }
};
