# Omeka S REST API Integration with PHP

A simple PHP application that demonstrates how to interact with Omeka S REST APIs to fetch and display items, item sets, and media data.


## Setup Instructions

1. **Clone the project files**


2. **Configure Omeka S API endpoints**
   - Update the API URLs in the code to match your Omeka S installation:
   ```php
   $items_url = 'http://your-omeka-domain.com/api/items';
   $item_set_url = 'http://your-omeka-domain.com/api/item_sets';
   $media_url = 'http://your-omeka-domain.com/api/media';
   ```

3. **Run the application**
   - Using PHP built-in server:
   ```bash
   php -S localhost:8080
   ```

## API Endpoints Used

- **Items**: `/api/items` - Retrieves all items from the Omeka S installation
- **Item Sets**: `/api/item_sets` - Retrieves all item sets (collections)
- **Media**: `/api/media` - Retrieves all media files

## Code Structure

### Main Function: `makeReq($baseUrl)`
- Handles cURL requests to Omeka S API, Processes JSON responses, Implements error handling for HTTP errors and JSON parsing failures, Displays formatted output for each endpoint

### Error Handling
- HTTP status code validation, JSON decoding error detection, HTML escaping for security (`htmlspecialchars()`)

## Challenges

### Limited Omeka S Documentation
**Issue**: The official Omeka S developer documentation is not very comprehensive, making it difficult to understand API response structures and available endpoints.

**Solution**: 
- Use trial and error approach with API calls
- Examine actual API responses to understand data structure