<div class="content">
    <div class="title">Something went wrong.</div>

    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
            Raven.showReportDialog({
                eventId: '{{ $sentryID }}',

                // use the public DSN (dont include your secret!)
                dsn: 'https://f38b87870ee94febb6570847fcc88ff7@sentry.io/167953'
            });
        </script>
    @endunless
</div>