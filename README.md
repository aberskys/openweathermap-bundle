# openweathermap-client

Bundle for OpenWeatherMap API client

## Jump to

 - [Quick start](#quick-start)
 - [Usage](#usage)
 
## Quick start

1. `composer-require aberskys/openweathermap-client`
2. Register bundle to `config/bundles.php`
3. Add a configuration to `app/config/config.yml`
    ```yaml
    open_weather_map_client:
        api_url: "http://foo.bar.com/"
    ```
4. Now just create a model through factory by the type of data you want,
inject client and make a call to API

## Usage

### Current weather call
You can get current weather by city name or coordinates.
Just inject `CurrentWeatherModelFactory` and call `create()` method.

#### Parameters
|Parameter |Type  |Nullable|
|----------|------|--------|
|cityName  |string|Yes     |
|latitude  |string|Yes     |
|longtitude|string|Yes     |

Even if all parameters are nullable, you have to enter either city name or latitude and longtitude for this method to work.