<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 77e3
    scl45rkt93
    authorize: true
    onLoad: onLinkedInLoad
</script>

<script>
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    // Handle the successful return from the API call
    function onSuccess(data) {
        console.log(data);
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        IN.API.Raw("/people/~:(email-address)").result(onSuccess).error(onError);
    }
</script>