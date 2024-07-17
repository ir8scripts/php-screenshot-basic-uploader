# Image Upload Script

This is a PHP based script that sends back the same response that `screenshot-basic` would expect. This was created in order to stop images from expiring on discord (Because they've became pretty strict over the last few months with that).

# Requirements

- Hosting that allows you to set folder permissions
- Hosting that supports PHP

# Setup

- Download the repo then place the files in your hosting.
- Make sure the chmod permissions for the images directory is set to 755

# Using

Where you would normally place the webhook url for screenshot basic, you would replace that with:

```
http://yourdomain/path-to-uploader-folder/upload.php
```

# Response

```
{
    attachments: [
        {
            url: "http://path/image.extension",
            proxy_url: "http://paath/image.extension
        }
    ]
}
```