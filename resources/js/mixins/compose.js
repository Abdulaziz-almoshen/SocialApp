import axios from "axios";
export default {
    data() {
        return {
            value: "50",
            errors: null,
            input: {
                required: true,
                type: String
            },
            props: {
                progress: {
                    required: true,
                    type: Number
                },


            },
            // to send to backend
            form: {
                body: '',
                media: []

            },
            // saved media from selected
            media: {
                images: [],
                video: '',
                progress: 0
            },
            // get the types from backend to compare
            mediaTypes: {}
        }
    },

    methods: {
        setDefault() {

            this.form.media = []
            this.form.body = ''
            this.media.progress = 0

        },

        async submit() {

            if (this.media.images.length || this.media.video) {
                let mediaIDs = await this.uploadFormData()
                this.form.media = mediaIDs.data.data.map(r => r.id)
            }

            await this.post()
            // axios.post('/api/tweets', this.form)
                .then((response) => {
                    // Success 🎉
                    console.log('response');
                    this.setDefault()
                })
                // Error 😨
                .catch((error) => {
                    // Error 😨
                    if (error.response) {
                        /*
                         * The request was made and the server responded with a
                         * status code that falls out of the range of 2xx
                         */
                        alert(error.response.data.errors)
                        console.log(error.response.data.errors);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        /*
                         * The request was made but no response was received, `error.request`
                         * is an instance of XMLHttpRequest in the browser and an instance
                         * of http.ClientRequest in Node.js
                         */
                        console.log(error.request);
                        alert('error in the request')
                    } else {
                        // Something happened in setting up the request and triggered an Error
                        console.log('Error', error.message);
                        alert('something happened please contact us!')

                    }
                    console.log(error.config);
                })
        },
        // build form in FormData to send
        buildMedia() {
            let fd = new FormData()
            if (this.media.images.length) {
                this.media.images.forEach((image, index) => {
                    fd.append(`media[${index}]`, image)
                })
            }
            if (this.media.video) {
                fd.append('media[0]', this.media.video)
            }
            return fd;
        },
        // send the FormData to /media post request
        async uploadFormData() {
            return await axios.post('/api/media', this.buildMedia(), {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: this.progressEvent
            })
        },
        handleFiles(files) {
            Array.from(files).slice(0,4).forEach((file) => {
                    if (this.mediaTypes.video.includes(file.type)) {
                            this.media.video = file
                            this.media.images = []
                    }
                    if (this.mediaTypes.image.includes(file.type)) {
                        this.media.images.push(file)
                    }
                })
        },
        progressEvent(event) {
            this.media.progress = parseInt(Math.round((event.loaded / event.total) * 100))

        },
        async getMediaType() {
            let response = await axios.get('/api/media/types');
            this.mediaTypes = response.data.data
        },
        updateimage(image) {
            this.media.images.pop(image)
        },
        updatedvideo(video) {
            this.media.video = null

        },
    },
    mounted() {
        this.getMediaType()
    }

}
