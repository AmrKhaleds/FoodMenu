import "./bootstrap";
// import TimeAgo from 'javascript-time-ago'
// // English.
// import en from 'javascript-time-ago/locale/en'

// TimeAgo.addDefaultLocale(en)
// timeAgo.format(Date.now() - 60 * 1000)

Echo.channel("order_notification")
    .listen("OrderNotificationEvent", (e) => {
        const counterElement = document.getElementById("counter");
        const newNotificationCounter = document.getElementById("newNotificationCounter")
        const customPageUrl = e.link;
        // notificationMessage.innerHTML = e.message;
        // Update Bell counter
        var notify_count = parseInt(counterElement.innerText);
        var new_notify_count = parseInt(newNotificationCounter.innerText);
        notify_count += 1;
        new_notify_count += 1;
        counterElement.innerHTML = notify_count;
        newNotificationCounter.innerHTML = new_notify_count;

        // Add Notification Elemnt when notification sent
        var notificationElement = document.getElementById("notification-element");
        var notificationItem = `
        <a href="${e.link}" target="_blank">
            <div class="media" style="background: #fafb8f9e">
                <div class="media-left align-self-center"><i
                        class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                <div class="media-body">
                    <h6 class="media-heading">الطلب رقم : ${e.title}</h6>
                    <p class="notification-text font-small-3 text-muted">${e.message}</p>
                    <small>
                        <time class="media-meta text-muted date-time" datetime="${e.created_at}">
                            
                        </time>
                    </small>
                </div>
            </div>
        </a>
        `;
        notificationElement.insertAdjacentHTML("afterbegin", notificationItem);
        // Apply timeago plugin to newly added time elements
        jQuery("time.date-time").timeago();

        // Inside the channel.bind() function
        if (Notification.permission === "granted") {
            // Display the notification
            const notification = new Notification(e.title, {
                body: e.message,
                data: {
                    url: e.link, // Replace with your custom page URL
                },
            });
            // Attach a click event listener to the notification
            notification.addEventListener("click", function() {
                // Open the custom page in a new tab
                window.open(customPageUrl, "_blank");
            });
            // Play the audio alert
            playAudioAlert();
        } else if (Notification.permission !== "denied") {
            // Request permission from the user
            Notification.requestPermission().then((permission) => {
                if (permission === "granted") {
                    // Display the notification
                    const notification = new Notification(e.title, {
                        body: e.message,
                        data: {
                            url: e.link, // Replace with your custom page URL
                        },
                    });
                    // Play the audio alert
                    // Store the custom page URL in a variable
                    // Attach a click event listener to the notification
                    notification.addEventListener("click", function() {
                        // Open the custom page in a new tab
                        window.open(customPageUrl, "_blank");
                    });
                    playAudioAlert();
                }
            });
        }
    });
// Function to play the audio alert
function playAudioAlert() {
    const audio = new Audio(
        "https://cdn.pixabay.com/audio/2022/10/16/audio_10bebc0b9f.mp3"
    ); // Replace with the actual path to your audio file
    audio.play();
}