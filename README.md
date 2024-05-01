Make a post request to:

```
curl --location 'http://127.0.0.1:8000/product' \
--header 'Content-Type: application/json' \
--insecure \
--data '{
    "name": "Product Name",
    "sku": "SKU",
    "active": true,
    "featuredColour": {
        "id": 1
    },
    "colours": [
        {
            "id": 1
        },
        {
            "id": 2
        }
    ]
}'
```

produces `<!-- Multiple non-persisted new entities were found through the given association graph:`
because the entites are not fetched


PUT:

```
curl --location 'http://127.0.0.1:8000/product/1' \
-X PUT \
--header 'Content-Type: application/json' \
--insecure \
--data '{
    "name": "Product Name",
    "sku": "SKU",
    "active": true,
    "featuredColour": {
        "id": 1
    },
    "colours": [
        {
            "id": 1
        }
    ]
}'
```