(function ($) {
    const WORDPRESS_MEDIA_UPLOAD = 'wordPressCoreExtendMediaUpload';

    /**
     *
     * @type {{button: {text: string}, onChange: function|false, multiple: boolean, title: string, value: boolean|varArray|number, templateRenderMedia: string|HTMLElement}}
     */
    WordPressMediaUpload.prototype.DEFAULTS = {
        title: "",
        button: {
            text: "Use this media",
        },
        multiple: false,
        value: false,
        onChange: false,
        name: 'thumbnail'
    };

    function WordPressMediaUpload($element, $options) {
        this.element = $($element);
        this.options = $.extend(this.options, WordPressMediaUpload.prototype.DEFAULTS, $options);
        this.frame = false;

        this.renderElement = document.createElement("section");
        this.renderElement.classList = "render-media";

        this.element.parent().append(this.renderElement);

        this.init();

        return this;
    }

    WordPressMediaUpload.prototype.init = function () {
        const $this = this;
        $this.initFrame();

        if ($this.options.value) {
            $this.render();
        }

        if ($this.frame) {
            $this.startEventListener();
        }
    }

    WordPressMediaUpload.prototype.initFrame = function () {
        const $this = this;

        if (!$this.frame && wp && wp?.media) {
            $this.frame = wp.media({
                title: $this.options.title,
                button: $this.options.button,
                multiple: $this.options.multiple
            });
        }
    }

    WordPressMediaUpload.prototype.startEventListener = function () {
        const $this = this;

        $($this.element).on('click', ($event) => {
            $event.preventDefault();
            $this.open()
        });

        if ($this.frame) {
            $this.frame.on('select', () => $this.select());
            $this.frame.on('open', () => $this.openEvent());
        }
    }

    WordPressMediaUpload.prototype.openEvent = function () {
        const $this = this;
        const $selection = $this.getSelection();

        if ($selection) {
            $selection.each(($image) => {
                const $attachment = wp.media.attachment($image.attributes.id);
                $attachment.fetch();
                $selection.remove($attachment ? [$attachment] : []);
            });
        }
    }

    WordPressMediaUpload.prototype.getSelection = function () {
        const $this = this;
        if ($this.frame) {
            return $this.frame.state().get('selection');
        }

        return false;
    }

    WordPressMediaUpload.prototype.select = function () {
        const $this = this;

        if ($this.frame) {
            const $attachmentSelection = $this.getSelection();

            if ($attachmentSelection) {
                const $attachment = $attachmentSelection.first().toJSON();
                if($this.options.multiple) {
                    $this.options.value = !$this.options.value ? [$attachment.id] : [...$this.options.value, $attachment.id];
                }else{
                    $this.options.value = $attachment.id;
                }
                if ($this.options.onChange) {
                    $this.options.onChange($attachment);
                } else {
                    $this.render();
                }
            }
        }
    }

    WordPressMediaUpload.prototype.render = function () {
        const $this = this;
        $($this.renderElement).html("");

        if ($this.options.multiple && $this.options.value) {
            $this.options.value.map(($value) => {
                $this.renderMedia($value);
            });
        }else if(!$this.options.multiple && $this.options.value) {
            $this.renderMedia($this.options.value);
        }
    }

    WordPressMediaUpload.prototype.renderMedia = function ($mediaId) {
        const $this = this;
        const $image = wp.media.attachment($mediaId);
        $image?.fetch().then(() => {
            if ($image) {
                const $section = document.createElement('div');
                const $inputElement = document.createElement('input');
                $inputElement.type = 'hidden';
                $inputElement.value = $mediaId;

                $inputElement.name = ($this.options.multiple) ? `${$this.options.name}[]` : $this.options.name;

                const $imageElement = document.createElement('img');
                $imageElement.src = $image?.attributes?.url;
                $imageElement.alt = $image?.attributes?.alt;
                $imageElement.style = 'width: 100px; height: auto';

                $section.append($imageElement);
                $section.append($inputElement);

                $this.renderElement.append($section);
            }
        });
    }

    WordPressMediaUpload.prototype.open = function ($event = false) {
        const $this = this;
        if ($event) {
            $event.preventDefault();
        }

        if ($this.frame) {
            $this.frame.open();
        }
    }

    $.fn.wordPressCoreExtendMediaUpload = function ($opts) {
        const $this = $(this);

        if (!$this.length) {
            return $this;
        }

        const $typeofOpts = typeof $opts === 'object';
        let $instance = $this.data(WORDPRESS_MEDIA_UPLOAD);

        if ($typeofOpts || !$opts) {
            $instance = new WordPressMediaUpload($this, $opts);
            $this.data(WORDPRESS_MEDIA_UPLOAD, $instance);

            return this;
        }

        if (!$instance) {
            $.error(`Plugin must be initialised before using method: ${$opts}`);
        }

        if (!$typeofOpts && $opts.indexOf('_') === 0) {
            $.error(`Method ${$opts} is private!`);
        }

        if ($instance && !($opts in $instance)) {
            $.error(`Method ${$opts} does not exist!`);
        }

        let args = Array.prototype.slice.call(arguments, 1);

        return $instance[$opts](...args);
    }
})(window.jQuery);
