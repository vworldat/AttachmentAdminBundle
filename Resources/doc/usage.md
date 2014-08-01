How to use AttachmentAdminBundle
===========================

Using AdminGeneratorGenerator
-----------------------------

There are several options working out of the box with the AdminGeneratorGeneratorBundle.

```yml

generator: admingenerator.generator.propel
params:
    model: my\Bundle\Model\Person
    namespace_prefix: my
    concurrency_lock: ~
    bundle_name: Bundle
    pk_requirement: ~
    fields:
        # Provide single upload for a dedicated field specified in the behavior
        AvatarFile:
            dbType:     BLOB
            formType:   afe_single_upload
            addFormOptions:
                # previewFilter requires the name of a liip_imagine or similar image converter filter
                previewFilter:  gallery_thumb
        
        # Embed collection upload for all attachments assigned to a single object, including specific ones.
        AllAttachmentsCollection:
            dbType:     collection
            formType:   afe_collection_upload
            addFormOptions:
                # if nameable is set to true, the user may save a custom text for each uploaded file.
                nameable:           true
                # images only
                acceptFileTypes:    /^image\/(gif|jpeg|png)$/
                # all files
                acceptFileTypes:    /^.*$/
                # set width and height for the preview images
                previewMaxWidth:    80
                previewMaxHeight:   60
                allow_add:          true
                allow_delete:       true
                error_bubbling:     false
                
                # by_reference must be kept false
                by_reference:       false
                type:               \C33s\AttachmentAdminBundle\Form\Type\Attachment\EditType
                options:
                    data_class:     C33s\AttachmentBundle\Model\Attachment

        # Embed collection upload for all attachments assigned to a single object, excluding specific ones ("avatar" and "icon" in the above example)
        GeneralAttachmentsCollection:
            dbType:     collection
            formType:   afe_collection_upload
            addFormOptions:
                # if nameable is set to true, the user may save a custom text for each uploaded file.
                nameable:           true

                # images only
                acceptFileTypes:    /^image\/(gif|jpeg|png)$/
                # all files
                acceptFileTypes:    /^.*$/

                # set width and height for the preview images
                previewMaxWidth:    80
                previewMaxHeight:   60
                allow_add:          true
                allow_delete:       true
                error_bubbling:     false
                
                # by_reference must be kept false
                by_reference:       false
                type:               \C33s\AttachmentAdminBundle\Form\Type\Attachment\EditType
                options:
                    data_class:     C33s\AttachmentBundle\Model\Attachment


builders:
    edit:
        params:
            title: "You're editing the object \"%object%\"|{ %object%: Person.title }|"
            display:
                - Name
                # use in edit forms
                - AvatarFile
                - AllAttachmentsCollection
                - GeneralAttachmentsCollection
                
```

For more configuration options check out [`avocode/form-extensions-bundle`](https://github.com/avocode/FormExtensions).
Much was possible after understanding [this issue documentation](https://github.com/avocode/FormExtensions/issues/32).
