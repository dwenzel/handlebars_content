Handlebars Content
==================

Provides a content object for the TYPO3 CMS which allows to render records using handlebars templates.
This extension relies on the `HandlebarsEngine` provided by the extension `handlebars`.

## Usage
```
tt_content {
    myextension_myContentElement = HANDLEBARSTEMPLATE
    variables {
        foo = TEXT
        foo.value = BAZ!
    }
    myextension_myContentElement {
        templateName = MyContent.hbs
        // optional data processing
        dataProcessing {
            1 = VendorName\ExtensionName\DataProcessing\MyContentElementProcessor
            1 {
                useHere = theConfigurationOfTheDataProcessor
            }
        }
    }
}
```