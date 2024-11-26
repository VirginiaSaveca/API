<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/vendor/scribe/css/theme-default.style.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/vendor/scribe/css/theme-default.print.css') }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
        body .content .bash-example code {
            display: none;
        }

        body .content .javascript-example code {
            display: none;
        }
    </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset('/vendor/scribe/js/tryitout-4.38.0.js') }}"></script>

    <script src="{{ asset('/vendor/scribe/js/theme-default-4.38.0.js') }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

    <a href="#" id="nav-button">
        <span>
            MENU
            <img src="{{ asset('/vendor/scribe/images/navbar.png') }}" alt="navbar-image" />
        </span>
    </a>
    <div class="tocify-wrapper">

        <div class="lang-selector">
            <button type="button" class="lang-button" data-language-name="bash">bash</button>
            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
        </div>

        <div class="search">
            <input type="text" class="search" id="input-search" placeholder="Search">
        </div>

        <div id="toc">
            <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
            </ul>
            <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
            </ul>
            <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-branches">
                        <a href="#endpoints-POSTapi-branches">Store a newly created resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-branches--id-">
                        <a href="#endpoints-PUTapi-branches--id-">Update the specified resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-branches--id-">
                        <a href="#endpoints-DELETEapi-branches--id-">Remove the specified resource from storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-organic_units">
                        <a href="#endpoints-POSTapi-organic_units">Store a newly created resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-organic_units--id-">
                        <a href="#endpoints-PUTapi-organic_units--id-">Update the specified resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-organic_units--id-">
                        <a href="#endpoints-DELETEapi-organic_units--id-">Remove the specified resource from
                            storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees">
                        <a href="#endpoints-GETapi-employees">Display a listing of the resource.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-employees">
                        <a href="#endpoints-POSTapi-employees">Store a newly created resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees--id-">
                        <a href="#endpoints-GETapi-employees--id-">Display the specified resource.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-employees--id-">
                        <a href="#endpoints-PUTapi-employees--id-">Update the specified resource in storage.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-employees--id-">
                        <a href="#endpoints-DELETEapi-employees--id-">Remove the specified resource from storage.</a>
                    </li>
                </ul>
            </ul>
        </div>

        <ul class="toc-footer" id="toc-footer">
            <li style="padding-bottom: 5px;"><a href="{{ route('scribe.postman') }}">View Postman collection</a></li>
            <li style="padding-bottom: 5px;"><a href="{{ route('scribe.openapi') }}">View OpenAPI spec</a></li>
            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
        </ul>

        <ul class="toc-footer" id="last-updated">
            <li>Last updated: November 26, 2024</li>
        </ul>
    </div>

    <div class="page-wrapper">
        <div class="dark-box"></div>
        <div class="content">
            <h1 id="introduction">Introduction</h1>
            <aside>
                <strong>Base URL</strong>: <code>http://localhost</code>
            </aside>
            <p>This documentation aims to provide all the information you need to work with our API.</p>
            <aside>As you scroll, you'll see code examples for working with the API in different programming languages
                in the dark area to the right (or as part of the content on mobile).
                You can switch the language used with the tabs at the top right (or from the nav menu at the top left on
                mobile).</aside>

            <h1 id="authenticating-requests">Authenticating requests</h1>
            <p>This API is not authenticated.</p>

            <h1 id="endpoints">Endpoints</h1>



            <h2 id="endpoints-GETapi-login">Handle the incoming request.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-login">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"feeney.ottilie@example.com\",
    \"password\": \"voluptas\",
    \"device_name\": \"jpxtonxnygzugzhjcuwoms\"
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "feeney.ottilie@example.com",
    "password": "voluptas",
    "device_name": "jpxtonxnygzugzhjcuwoms"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-login">
                <blockquote>
                    <p>Example response (422):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The provided credentials are incorrect.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The provided credentials are incorrect.&quot;
        ]
    }
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-login" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-login"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-login" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-login" data-method="GET" data-path="api/login" data-authed="0" data-hasfiles="0"
                data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-login', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-login" onclick="tryItOut('GETapi-login');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-login" onclick="cancelTryOut('GETapi-login');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-login" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/login</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="GETapi-login"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-login"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email" data-endpoint="GETapi-login"
                        value="feeney.ottilie@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. Example:
                        <code>feeney.ottilie@example.com</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="password" data-endpoint="GETapi-login"
                        value="voluptas" data-component="body">
                    <br>
                    <p>Example: <code>voluptas</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>device_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="device_name" data-endpoint="GETapi-login"
                        value="jpxtonxnygzugzhjcuwoms" data-component="body">
                    <br>
                    <p>O campo value não deverá conter mais de 255 caracteres. Example:
                        <code>jpxtonxnygzugzhjcuwoms</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-logout">Handle the incoming request.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-logout">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-logout">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-logout" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-logout"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-logout" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-logout" data-method="GET" data-path="api/logout" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-logout', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-logout" onclick="tryItOut('GETapi-logout');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-logout" onclick="cancelTryOut('GETapi-logout');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-logout" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/logout</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="GETapi-logout"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-logout"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-register">Handle the incoming request.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-register">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"qmoyguf\",
    \"email\": \"chase.emard@example.com\",
    \"password\": \"e(t-&lt;yz)4WGGy1Hx|v\",
    \"device_name\": \"whgctagqwyiqpaa\"
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "qmoyguf",
    "email": "chase.emard@example.com",
    "password": "e(t-&lt;yz)4WGGy1Hx|v",
    "device_name": "whgctagqwyiqpaa"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-register">
                <blockquote>
                    <p>Example response (201):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;user&quot;: {
        &quot;name&quot;: &quot;qmoyguf&quot;,
        &quot;email&quot;: &quot;chase.emard@example.com&quot;
    },
    &quot;token&quot;: &quot;19|OsXDOSnQ70gMYVmKWUDJ1APdsvVHmSGOwkDyep4E0b7b16d7&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-register" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-register"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-register" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-register" data-method="GET" data-path="api/register" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-register', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-register" onclick="tryItOut('GETapi-register');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-register" onclick="cancelTryOut('GETapi-register');" hidden>Cancel
                        🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-register" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/register</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="GETapi-register"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-register"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name" data-endpoint="GETapi-register"
                        value="qmoyguf" data-component="body">
                    <br>
                    <p>O campo value não deverá conter mais de 255 caracteres. Example: <code>qmoyguf</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email" data-endpoint="GETapi-register"
                        value="chase.emard@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. O campo value não deverá conter mais de
                        254 caracteres. Example: <code>chase.emard@example.com</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="password" data-endpoint="GETapi-register"
                        value="e(t-<yz)4WGGy1Hx|v" data-component="body">
                    <br>
                    <p>O campo value não deverá conter mais de 255 caracteres. Example:
                        <code>e(t-&lt;yz)4WGGy1Hx|v</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>device_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="device_name" data-endpoint="GETapi-register"
                        value="whgctagqwyiqpaa" data-component="body">
                    <br>
                    <p>O campo value não deverá conter mais de 255 caracteres. Example: <code>whgctagqwyiqpaa</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-user">GET api/user</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-user">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-user">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-user" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-user" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="0" data-hasfiles="0"
                data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-user" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/user</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="GETapi-user"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-user"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-branches">Display a listing of the resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-branches">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/branches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/branches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-branches">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-branches" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-branches"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-branches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-branches" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-branches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-branches" data-method="GET" data-path="api/branches" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-branches', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-branches" onclick="tryItOut('GETapi-branches');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-branches" onclick="cancelTryOut('GETapi-branches');" hidden>Cancel
                        🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-branches" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/branches</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="GETapi-branches"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-branches"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
            </form>

            <h2 id="endpoints-POSTapi-branches">Store a newly created resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-POSTapi-branches">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/branches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"n\",
    \"address\": \"sorybrvug\"
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/branches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "n",
    "address": "sorybrvug"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-POSTapi-branches">
            </span>
            <span id="execution-results-POSTapi-branches" hidden>
                <blockquote>Received response<span id="execution-response-status-POSTapi-branches"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-POSTapi-branches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-POSTapi-branches" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-POSTapi-branches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-POSTapi-branches" data-method="POST" data-path="api/branches" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('POSTapi-branches', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-POSTapi-branches" onclick="tryItOut('POSTapi-branches');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-POSTapi-branches" onclick="cancelTryOut('POSTapi-branches');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-POSTapi-branches" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-black">POST</small>
                    <b><code>api/branches</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type" data-endpoint="POSTapi-branches"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="POSTapi-branches"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name" data-endpoint="POSTapi-branches"
                        value="n" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>n</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="address" data-endpoint="POSTapi-branches"
                        value="sorybrvug" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>sorybrvug</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-branches--id-">Display the specified resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-branches--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/branches/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/branches/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-branches--id-">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-branches--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-branches--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-branches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-branches--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-branches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-branches--id-" data-method="GET" data-path="api/branches/{id}" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-branches--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-branches--id-" onclick="tryItOut('GETapi-branches--id-');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-branches--id-" onclick="cancelTryOut('GETapi-branches--id-');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-branches--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/branches/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="GETapi-branches--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-branches--id-"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="GETapi-branches--id-" value="2" data-component="url">
                    <br>
                    <p>The ID of the branch. Example: <code>2</code></p>
                </div>
            </form>

            <h2 id="endpoints-PUTapi-branches--id-">Update the specified resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-PUTapi-branches--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/branches/20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"nxtbfpgrjjqos\",
    \"address\": \"bgajdsmnjnkrwlvlv\"
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/branches/20"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "nxtbfpgrjjqos",
    "address": "bgajdsmnjnkrwlvlv"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-PUTapi-branches--id-">
            </span>
            <span id="execution-results-PUTapi-branches--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-PUTapi-branches--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-PUTapi-branches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-PUTapi-branches--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-PUTapi-branches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-PUTapi-branches--id-" data-method="PUT" data-path="api/branches/{id}" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('PUTapi-branches--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-PUTapi-branches--id-" onclick="tryItOut('PUTapi-branches--id-');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-PUTapi-branches--id-" onclick="cancelTryOut('PUTapi-branches--id-');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-PUTapi-branches--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-darkblue">PUT</small>
                    <b><code>api/branches/{id}</code></b>
                </p>
                <p>
                    <small class="badge badge-purple">PATCH</small>
                    <b><code>api/branches/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="PUTapi-branches--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="PUTapi-branches--id-"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="PUTapi-branches--id-" value="20" data-component="url">
                    <br>
                    <p>The ID of the branch. Example: <code>20</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name" data-endpoint="PUTapi-branches--id-"
                        value="nxtbfpgrjjqos" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>nxtbfpgrjjqos</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="address" data-endpoint="PUTapi-branches--id-"
                        value="bgajdsmnjnkrwlvlv" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>bgajdsmnjnkrwlvlv</code></p>
                </div>
            </form>

            <h2 id="endpoints-DELETEapi-branches--id-">Remove the specified resource from storage.</h2>

            <p>
            </p>



            <span id="example-requests-DELETEapi-branches--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/branches/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/branches/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-DELETEapi-branches--id-">
            </span>
            <span id="execution-results-DELETEapi-branches--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-DELETEapi-branches--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-DELETEapi-branches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-DELETEapi-branches--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-DELETEapi-branches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-DELETEapi-branches--id-" data-method="DELETE" data-path="api/branches/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('DELETEapi-branches--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-DELETEapi-branches--id-" onclick="tryItOut('DELETEapi-branches--id-');">Try it
                        out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-DELETEapi-branches--id-"
                        onclick="cancelTryOut('DELETEapi-branches--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-DELETEapi-branches--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-red">DELETE</small>
                    <b><code>api/branches/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="DELETEapi-branches--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="DELETEapi-branches--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="DELETEapi-branches--id-" value="16" data-component="url">
                    <br>
                    <p>The ID of the branch. Example: <code>2</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-organic_units">Display a listing of the resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-organic_units">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/organic_units" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/organic_units"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-organic_units">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-organic_units" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-organic_units"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-organic_units"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-organic_units" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-organic_units">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-organic_units" data-method="GET" data-path="api/organic_units" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-organic_units', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-organic_units" onclick="tryItOut('GETapi-organic_units');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-organic_units" onclick="cancelTryOut('GETapi-organic_units');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-organic_units" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/organic_units</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="GETapi-organic_units" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-organic_units"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
            </form>

            <h2 id="endpoints-POSTapi-employees">Store a newly created resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-POSTapi-employees">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/organic_units" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"lgnegfonchursasmxmszvtfa\",
    \"branches\": [
        7294724.5823315
    ]
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/organic_units"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "lgnegfonchursasmxmszvtfa",
    "branches": [
        7294724.5823315
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-POSTapi-employees">
            </span>
            <span id="execution-results-POSTapi-employees" hidden>
                <blockquote>Received response<span id="execution-response-status-POSTapi-employees"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-POSTapi-employees"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-POSTapi-employees" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-POSTapi-employees">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-POSTapi-employees" data-method="POST" data-path="api/employees" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('POSTapi-employees', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-POSTapi-employees" onclick="tryItOut('POSTapi-employees');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-POSTapi-employees" onclick="cancelTryOut('POSTapi-employees');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-POSTapi-employees" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-black">POST</small>
                    <b><code>api/employees</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="POSTapi-employees" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="POSTapi-employees"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>branch_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="branch_id"
                        data-endpoint="POSTapi-employees" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>organic_unit_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="organic_unit_id"
                        data-endpoint="POSTapi-employees" value="6" data-component="body">
                    <br>
                    <p>Example: <code>6</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="department_id"
                        data-endpoint="POSTapi-employees" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>partition_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="partition_id"
                        data-endpoint="POSTapi-employees" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>career_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="career_id"
                        data-endpoint="POSTapi-employees" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="category_id"
                        data-endpoint="POSTapi-employees" value="12" data-component="body">
                    <br>
                    <p>Example: <code>12</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="level_id"
                        data-endpoint="POSTapi-employees" value="16" data-component="body">
                    <br>
                    <p>Example: <code>16</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>salary_level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="salary_level_id"
                        data-endpoint="POSTapi-employees" value="2" data-component="body">
                    <br>
                    <p>Example: <code>2</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name" data-endpoint="POSTapi-organic_units"
                        value="lgnegfonchursasmxmszvtfa" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>lgnegfonchursasmxmszvtfa</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>birthdate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="birthdate" data-endpoint="POSTapi-employees"
                        value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="contact"
                        data-endpoint="POSTapi-employees" value="15540448.103" data-component="body">
                    <br>
                    <p>Example: <code>15540448.103</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nationality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="nationality" data-endpoint="POSTapi-employees"
                        value="explicabo" data-component="body">
                    <br>
                    <p>Example: <code>explicabo</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>naturality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="naturality" data-endpoint="POSTapi-employees"
                        value="qui" data-component="body">
                    <br>
                    <p>Example: <code>qui</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email" data-endpoint="POSTapi-employees"
                        value="genevieve04@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. Example:
                        <code>genevieve04@example.com</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>father_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="father_name" data-endpoint="POSTapi-employees"
                        value="dicta" data-component="body">
                    <br>
                    <p>Example: <code>dicta</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>mother_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="mother_name" data-endpoint="POSTapi-employees"
                        value="deleniti" data-component="body">
                    <br>
                    <p>Example: <code>deleniti</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_nr</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_nr" data-endpoint="POSTapi-employees"
                        value="sint" data-component="body">
                    <br>
                    <p>Example: <code>sint</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_validate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_validate"
                        data-endpoint="POSTapi-employees" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nuit</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="nuit"
                        data-endpoint="POSTapi-employees" value="10537540.784393" data-component="body">
                    <br>

                </div>
            </form>

            <h2 id="endpoints-GETapi-organic_units--id-">Display the specified resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-organic_units--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/organic_units/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/organic_units/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-organic_units--id-">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-organic_units--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-organic_units--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-organic_units--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-organic_units--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-organic_units--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-organic_units--id-" data-method="GET" data-path="api/organic_units/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-organic_units--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-organic_units--id-"
                        onclick="tryItOut('GETapi-organic_units--id-');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-organic_units--id-"
                        onclick="cancelTryOut('GETapi-organic_units--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-organic_units--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/organic_units/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="GETapi-organic_units--id-" value="application/json"
                        data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="GETapi-organic_units--id-" value="application/json"
                        data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="GETapi-organic_units--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the organic unit. Example: <code>1</code></p>
                </div>
            </form>

            <h2 id="endpoints-PUTapi-employees--id-">Update the specified resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-PUTapi-employees--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/organic_units/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"lctnpiqdvhbvjnfcz\",
    \"branches\": [
        93.8
    ]
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/organic_units/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "lctnpiqdvhbvjnfcz",
    "branches": [
        93.8
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-PUTapi-employees--id-">
            </span>
            <span id="execution-results-PUTapi-employees--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-PUTapi-employees--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-PUTapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-PUTapi-employees--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-PUTapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-PUTapi-employees--id-" data-method="PUT" data-path="api/employees/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('PUTapi-employees--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-PUTapi-employees--id-" onclick="tryItOut('PUTapi-employees--id-');">Try it
                        out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-PUTapi-employees--id-" onclick="cancelTryOut('PUTapi-employees--id-');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-PUTapi-employees--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-darkblue">PUT</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <p>
                    <small class="badge badge-purple">PATCH</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="PUTapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="PUTapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="PUTapi-organic_units--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the organic unit. Example: <code>1</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>branch_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="branch_id"
                        data-endpoint="PUTapi-employees--id-" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>organic_unit_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="organic_unit_id"
                        data-endpoint="PUTapi-employees--id-" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="department_id"
                        data-endpoint="PUTapi-employees--id-" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>partition_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="partition_id"
                        data-endpoint="PUTapi-employees--id-" value="2" data-component="body">
                    <br>
                    <p>Example: <code>2</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>career_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="career_id"
                        data-endpoint="PUTapi-employees--id-" value="11" data-component="body">
                    <br>
                    <p>Example: <code>11</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="category_id"
                        data-endpoint="PUTapi-employees--id-" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="level_id"
                        data-endpoint="PUTapi-employees--id-" value="20" data-component="body">
                    <br>
                    <p>Example: <code>20</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>salary_level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="salary_level_id"
                        data-endpoint="PUTapi-employees--id-" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name"
                        data-endpoint="PUTapi-organic_units--id-" value="lctnpiqdvhbvjnfcz" data-component="body">
                    <br>
                    <p>O campo value deverá conter no mínimo 2 caracteres. O campo value não deverá conter mais de 255
                        caracteres. Example: <code>lctnpiqdvhbvjnfcz</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>birthdate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="birthdate"
                        data-endpoint="PUTapi-employees--id-" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="contact"
                        data-endpoint="PUTapi-employees--id-" value="230137.5115927" data-component="body">
                    <br>
                    <p>Example: <code>230137.5115927</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nationality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="nationality"
                        data-endpoint="PUTapi-employees--id-" value="voluptatem" data-component="body">
                    <br>
                    <p>Example: <code>voluptatem</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>naturality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="naturality"
                        data-endpoint="PUTapi-employees--id-" value="sit" data-component="body">
                    <br>
                    <p>Example: <code>sit</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email"
                        data-endpoint="PUTapi-employees--id-" value="estrosin@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. Example: <code>estrosin@example.com</code>
                    </p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>father_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="father_name"
                        data-endpoint="PUTapi-employees--id-" value="voluptas" data-component="body">
                    <br>
                    <p>Example: <code>voluptas</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>mother_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="mother_name"
                        data-endpoint="PUTapi-employees--id-" value="quos" data-component="body">
                    <br>
                    <p>Example: <code>quos</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_nr</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_nr"
                        data-endpoint="PUTapi-employees--id-" value="vero" data-component="body">
                    <br>
                    <p>Example: <code>vero</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_validate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_validate"
                        data-endpoint="PUTapi-employees--id-" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nuit</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="nuit"
                        data-endpoint="PUTapi-employees--id-" value="19.7185833" data-component="body">
                    <br>
                    <p>Example: <code>19.7185833</code></p>
                </div>
            </form>

            <h2 id="endpoints-DELETEapi-employees--id-">Remove the specified resource from storage.</h2>

            <p>
            </p>



            <span id="example-requests-DELETEapi-employees--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/organic_units/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/organic_units/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-DELETEapi-employees--id-">
            </span>
            <span id="execution-results-DELETEapi-employees--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-DELETEapi-employees--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-DELETEapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-DELETEapi-employees--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-DELETEapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-DELETEapi-employees--id-" data-method="DELETE" data-path="api/employees/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('DELETEapi-employees--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-DELETEapi-employees--id-" onclick="tryItOut('DELETEapi-employees--id-');">Try
                        it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-DELETEapi-employees--id-"
                        onclick="cancelTryOut('DELETEapi-employees--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-DELETEapi-employees--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-red">DELETE</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="DELETEapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="DELETEapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="DELETEapi-organic_units--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the organic unit. Example: <code>1</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-employees">Display a listing of the resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-employees">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/employees" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/employees"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-employees">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-employees" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-employees"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-employees"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-employees" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-employees">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-employees" data-method="GET" data-path="api/employees" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-employees', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-employees" onclick="tryItOut('GETapi-employees');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-employees" onclick="cancelTryOut('GETapi-employees');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-employees" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/employees</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="GETapi-employees" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="GETapi-employees"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
            </form>

            <h2 id="endpoints-POSTapi-employees">Store a newly created resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-POSTapi-employees">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/employees" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"branch_id\": 9,
    \"organic_unit_id\": 6,
    \"department_id\": 18,
    \"partition_id\": 17,
    \"career_id\": 9,
    \"category_id\": 12,
    \"level_id\": 16,
    \"salary_level_id\": 2,
    \"name\": \"nisi\",
    \"birthdate\": \"2024-11-26T12:15:00\",
    \"contact\": 15540448.103,
    \"nationality\": \"explicabo\",
    \"naturality\": \"qui\",
    \"email\": \"genevieve04@example.com\",
    \"father_name\": \"dicta\",
    \"mother_name\": \"deleniti\",
    \"bi_nr\": \"sint\",
    \"bi_validate\": \"2024-11-26T12:15:00\",
    \"nuit\": 10537540.7843926
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/employees"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "branch_id": 9,
    "organic_unit_id": 6,
    "department_id": 18,
    "partition_id": 17,
    "career_id": 9,
    "category_id": 12,
    "level_id": 16,
    "salary_level_id": 2,
    "name": "nisi",
    "birthdate": "2024-11-26T12:15:00",
    "contact": 15540448.103,
    "nationality": "explicabo",
    "naturality": "qui",
    "email": "genevieve04@example.com",
    "father_name": "dicta",
    "mother_name": "deleniti",
    "bi_nr": "sint",
    "bi_validate": "2024-11-26T12:15:00",
    "nuit": 10537540.7843926
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-POSTapi-employees">
            </span>
            <span id="execution-results-POSTapi-employees" hidden>
                <blockquote>Received response<span id="execution-response-status-POSTapi-employees"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-POSTapi-employees"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-POSTapi-employees" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-POSTapi-employees">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-POSTapi-employees" data-method="POST" data-path="api/employees" data-authed="0"
                data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('POSTapi-employees', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-POSTapi-employees" onclick="tryItOut('POSTapi-employees');">Try it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-POSTapi-employees" onclick="cancelTryOut('POSTapi-employees');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-POSTapi-employees" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-black">POST</small>
                    <b><code>api/employees</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="POSTapi-employees" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept" data-endpoint="POSTapi-employees"
                        value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>branch_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="branch_id"
                        data-endpoint="POSTapi-employees" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>organic_unit_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="organic_unit_id"
                        data-endpoint="POSTapi-employees" value="6" data-component="body">
                    <br>
                    <p>Example: <code>6</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="department_id"
                        data-endpoint="POSTapi-employees" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>partition_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="partition_id"
                        data-endpoint="POSTapi-employees" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>career_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="career_id"
                        data-endpoint="POSTapi-employees" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="category_id"
                        data-endpoint="POSTapi-employees" value="12" data-component="body">
                    <br>
                    <p>Example: <code>12</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="level_id"
                        data-endpoint="POSTapi-employees" value="16" data-component="body">
                    <br>
                    <p>Example: <code>16</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>salary_level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="salary_level_id"
                        data-endpoint="POSTapi-employees" value="2" data-component="body">
                    <br>
                    <p>Example: <code>2</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name" data-endpoint="POSTapi-employees"
                        value="nisi" data-component="body">
                    <br>
                    <p>Example: <code>nisi</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>birthdate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="birthdate"
                        data-endpoint="POSTapi-employees" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="contact"
                        data-endpoint="POSTapi-employees" value="15540448.103" data-component="body">
                    <br>
                    <p>Example: <code>15540448.103</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nationality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="nationality"
                        data-endpoint="POSTapi-employees" value="explicabo" data-component="body">
                    <br>
                    <p>Example: <code>explicabo</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>naturality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="naturality"
                        data-endpoint="POSTapi-employees" value="qui" data-component="body">
                    <br>
                    <p>Example: <code>qui</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email" data-endpoint="POSTapi-employees"
                        value="genevieve04@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. Example:
                        <code>genevieve04@example.com</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>father_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="father_name"
                        data-endpoint="POSTapi-employees" value="dicta" data-component="body">
                    <br>
                    <p>Example: <code>dicta</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>mother_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="mother_name"
                        data-endpoint="POSTapi-employees" value="deleniti" data-component="body">
                    <br>
                    <p>Example: <code>deleniti</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_nr</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_nr" data-endpoint="POSTapi-employees"
                        value="sint" data-component="body">
                    <br>
                    <p>Example: <code>sint</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_validate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_validate"
                        data-endpoint="POSTapi-employees" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nuit</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="nuit"
                        data-endpoint="POSTapi-employees" value="10537540.784393" data-component="body">
                    <br>
                    <p>Example: <code>10537540.784393</code></p>
                </div>
            </form>

            <h2 id="endpoints-GETapi-employees--id-">Display the specified resource.</h2>

            <p>
            </p>



            <span id="example-requests-GETapi-employees--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/employees/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/employees/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-GETapi-employees--id-">
                <blockquote>
                    <p>Example response (401):</p>
                </blockquote>
                <details class="annotation">
                    <summary style="cursor: pointer;">
                        <small
                            onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show
                            headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            </span>
            <span id="execution-results-GETapi-employees--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-GETapi-employees--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-GETapi-employees--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-GETapi-employees--id-" data-method="GET" data-path="api/employees/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('GETapi-employees--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-GETapi-employees--id-" onclick="tryItOut('GETapi-employees--id-');">Try it
                        out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-GETapi-employees--id-" onclick="cancelTryOut('GETapi-employees--id-');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-GETapi-employees--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="GETapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="GETapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="GETapi-employees--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the employee. Example: <code>1</code></p>
                </div>
            </form>

            <h2 id="endpoints-PUTapi-employees--id-">Update the specified resource in storage.</h2>

            <p>
            </p>



            <span id="example-requests-PUTapi-employees--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/employees/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"branch_id\": 9,
    \"organic_unit_id\": 17,
    \"department_id\": 18,
    \"partition_id\": 2,
    \"career_id\": 11,
    \"category_id\": 18,
    \"level_id\": 20,
    \"salary_level_id\": 17,
    \"name\": \"nostrum\",
    \"birthdate\": \"2024-11-26T12:15:00\",
    \"contact\": 230137.5115927,
    \"nationality\": \"voluptatem\",
    \"naturality\": \"sit\",
    \"email\": \"estrosin@example.com\",
    \"father_name\": \"voluptas\",
    \"mother_name\": \"quos\",
    \"bi_nr\": \"vero\",
    \"bi_validate\": \"2024-11-26T12:15:00\",
    \"nuit\": 19.7185833
}"
</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/employees/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "branch_id": 9,
    "organic_unit_id": 17,
    "department_id": 18,
    "partition_id": 2,
    "career_id": 11,
    "category_id": 18,
    "level_id": 20,
    "salary_level_id": 17,
    "name": "nostrum",
    "birthdate": "2024-11-26T12:15:00",
    "contact": 230137.5115927,
    "nationality": "voluptatem",
    "naturality": "sit",
    "email": "estrosin@example.com",
    "father_name": "voluptas",
    "mother_name": "quos",
    "bi_nr": "vero",
    "bi_validate": "2024-11-26T12:15:00",
    "nuit": 19.7185833
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-PUTapi-employees--id-">
            </span>
            <span id="execution-results-PUTapi-employees--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-PUTapi-employees--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-PUTapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-PUTapi-employees--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-PUTapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-PUTapi-employees--id-" data-method="PUT" data-path="api/employees/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('PUTapi-employees--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-PUTapi-employees--id-" onclick="tryItOut('PUTapi-employees--id-');">Try it
                        out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-PUTapi-employees--id-" onclick="cancelTryOut('PUTapi-employees--id-');"
                        hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-PUTapi-employees--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-darkblue">PUT</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <p>
                    <small class="badge badge-purple">PATCH</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="PUTapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="PUTapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="PUTapi-employees--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the employee. Example: <code>1</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>branch_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="branch_id"
                        data-endpoint="PUTapi-employees--id-" value="9" data-component="body">
                    <br>
                    <p>Example: <code>9</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>organic_unit_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="organic_unit_id"
                        data-endpoint="PUTapi-employees--id-" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="department_id"
                        data-endpoint="PUTapi-employees--id-" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>partition_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="partition_id"
                        data-endpoint="PUTapi-employees--id-" value="2" data-component="body">
                    <br>
                    <p>Example: <code>2</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>career_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="career_id"
                        data-endpoint="PUTapi-employees--id-" value="11" data-component="body">
                    <br>
                    <p>Example: <code>11</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="category_id"
                        data-endpoint="PUTapi-employees--id-" value="18" data-component="body">
                    <br>
                    <p>Example: <code>18</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="level_id"
                        data-endpoint="PUTapi-employees--id-" value="20" data-component="body">
                    <br>
                    <p>Example: <code>20</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>salary_level_id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="salary_level_id"
                        data-endpoint="PUTapi-employees--id-" value="17" data-component="body">
                    <br>
                    <p>Example: <code>17</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="name"
                        data-endpoint="PUTapi-employees--id-" value="nostrum" data-component="body">
                    <br>
                    <p>Example: <code>nostrum</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>birthdate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="birthdate"
                        data-endpoint="PUTapi-employees--id-" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="contact"
                        data-endpoint="PUTapi-employees--id-" value="230137.5115927" data-component="body">
                    <br>
                    <p>Example: <code>230137.5115927</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nationality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="nationality"
                        data-endpoint="PUTapi-employees--id-" value="voluptatem" data-component="body">
                    <br>
                    <p>Example: <code>voluptatem</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>naturality</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="naturality"
                        data-endpoint="PUTapi-employees--id-" value="sit" data-component="body">
                    <br>
                    <p>Example: <code>sit</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="email"
                        data-endpoint="PUTapi-employees--id-" value="estrosin@example.com" data-component="body">
                    <br>
                    <p>O campo value não contém um endereço de e-mail válido. Example: <code>estrosin@example.com</code>
                    </p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>father_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="father_name"
                        data-endpoint="PUTapi-employees--id-" value="voluptas" data-component="body">
                    <br>
                    <p>Example: <code>voluptas</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>mother_name</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="mother_name"
                        data-endpoint="PUTapi-employees--id-" value="quos" data-component="body">
                    <br>
                    <p>Example: <code>quos</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_nr</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_nr"
                        data-endpoint="PUTapi-employees--id-" value="vero" data-component="body">
                    <br>
                    <p>Example: <code>vero</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>bi_validate</code></b>&nbsp;&nbsp;
                    <small>string</small>&nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="bi_validate"
                        data-endpoint="PUTapi-employees--id-" value="2024-11-26T12:15:00" data-component="body">
                    <br>
                    <p>O campo value não contém uma data válida. Example: <code>2024-11-26T12:15:00</code></p>
                </div>
                <div style=" padding-left: 28px;  clear: unset;">
                    <b style="line-height: 2;"><code>nuit</code></b>&nbsp;&nbsp;
                    <small>number</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="nuit"
                        data-endpoint="PUTapi-employees--id-" value="19.7185833" data-component="body">
                    <br>
                    <p>Example: <code>19.7185833</code></p>
                </div>
            </form>

            <h2 id="endpoints-DELETEapi-employees--id-">Remove the specified resource from storage.</h2>

            <p>
            </p>



            <span id="example-requests-DELETEapi-employees--id-">
                <blockquote>Example request:</blockquote>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/employees/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/employees/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>

            </span>

            <span id="example-responses-DELETEapi-employees--id-">
            </span>
            <span id="execution-results-DELETEapi-employees--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-DELETEapi-employees--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-DELETEapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
            </span>
            <span id="execution-error-DELETEapi-employees--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-DELETEapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
            </span>
            <form id="form-DELETEapi-employees--id-" data-method="DELETE" data-path="api/employees/{id}"
                data-authed="0" data-hasfiles="0" data-isarraybody="0" autocomplete="off"
                onsubmit="event.preventDefault(); executeTryOut('DELETEapi-employees--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                        style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-tryout-DELETEapi-employees--id-" onclick="tryItOut('DELETEapi-employees--id-');">Try
                        it out ⚡
                    </button>
                    <button type="button"
                        style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-canceltryout-DELETEapi-employees--id-"
                        onclick="cancelTryOut('DELETEapi-employees--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit"
                        style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                        id="btn-executetryout-DELETEapi-employees--id-" data-initial-text="Send Request 💥"
                        data-loading-text="⏱ Sending..." hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-red">DELETE</small>
                    <b><code>api/employees/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Content-Type"
                        data-endpoint="DELETEapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="text" style="display: none" name="Accept"
                        data-endpoint="DELETEapi-employees--id-" value="application/json" data-component="header">
                    <br>
                    <p>Example: <code>application/json</code></p>
                </div>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <div style="padding-left: 28px; clear: unset;">
                    <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
                    <small>integer</small>&nbsp;
                    &nbsp;
                    <input type="number" style="display: none" step="any" name="id"
                        data-endpoint="DELETEapi-employees--id-" value="1" data-component="url">
                    <br>
                    <p>The ID of the employee. Example: <code>1</code></p>
                </div>
            </form>




        </div>
        <div class="dark-box">
            <div class="lang-selector">
                <button type="button" class="lang-button" data-language-name="bash">bash</button>
                <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
            </div>
        </div>
    </div>
</body>

</html>
