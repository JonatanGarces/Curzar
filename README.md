Curzar_CustomerList is a Magento module for selling courses in a Magento store. It creates a new product type with the possibility to create sections, resources, and videos similar to Moodle.org. These features are available in the customer dashboard once the product is purchased.

Curzar_Graphql and Curzar_Repository are 2 modules that creates a graphql endpoint for a Graphcommerce feature

cd /<magento folder>/app/code
git clone https://github.com/JonatanGarces/Curzar.git
cd /<magento folder>
php bin/magento module:enable Curzar_CustomerList Curzar_Graphql Curzar_Repository
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush