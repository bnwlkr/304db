import React from "react";
import "./Reference.css";
import { PageHeader } from "react-bootstrap";

export default () =>

    <div id="content">
        <section class="method first-of-group" id="intro">
            <div class="method-area">
                <div class="method-copy">
                    <div class="first-method-copy-padding">
                        <PageHeader>API Reference</PageHeader>
                        <p>
                            Our group's API is organized around <a href="http://en.wikipedia.org/wiki/Representational_State_Transfer">REST</a>. <a href="http://www.json.org/">JSON</a> is returned by all API responses, including errors, unless otherwise specified.
                        </p>
                        {/* <p>
                            To make the API as explorable as possible, accounts have test mode and live mode API keys. There is no "switch" for changing between modes, just use the appropriate key to perform a live or test transaction. Requests made with test mode credentials never hit the banking networks and incur no cost.
                        </p>*/}
                        {/*<p>
                            Be sure to subscribe to Stripe's <a href="https://groups.google.com/a/lists.stripe.com/group/api-announce/">API announce mailing list</a> to receive information on new additions and changes to Stripe's API and language libraries.
                        </p> */}
                    </div>
                </div>
            </div>
        </section>
        {/* <section class="method first-of-group" id="authentication">
            <div class="method-area">
                <div class="method-copy">
                    <div class="method-copy-padding">
                        <PageHeader>Authentication</PageHeader>
                        <p>
                            Authenticate your account by including your secret key in API requests. You can manage your API keys in the <a href="https://dashboard.stripe.com/account/apikeys">Dashboard</a>. Your API keys carry many privileges, so be sure to keep them secure! Do not share your secret API keys in publicly accessible areas such GitHub, client-side code, and so forth.
                        </p>
                        <p>
                            Authentication to the API is performed via <a href="http://en.wikipedia.org/wiki/Basic_access_authentication">HTTP Basic Auth</a>. Provide your API key as the basic auth username value. You do not need to provide a password.
                        </p>
                        <p>
                            If you need to authenticate via bearer auth (e.g., for a cross-origin request), use <code>-H "Authorization: Bearer sk_test_BQokikJOvBiI2HlWgH4olfQ2"</code> instead of <code>-u sk_test_BQokikJOvBiI2HlWgH4olfQ2:</code>.
                        </p>
                        <p>
                            All API requests must be made over <a href="http://en.wikipedia.org/wiki/HTTP_Secure">HTTPS</a>. Calls made over plain HTTP will fail. API requests without authentication will also fail.
                        </p>
                        <p>
                            curl uses the <code>-u</code> flag to pass basic auth credentials. (Adding a colon after your API key prevents curl from asking for a password.)
                        </p>
                        <p>
                            A sample test API key is included in all the examples here, so you can test any example right away. To test requests using your account, replace the sample API key with your actual API key.
                        </p>
                    </div>
                </div>
            </div>
         </section> */}
        <section class="method first-of-group" id="errors">
        </section>
        <section class="method" id="error_handling">
        </section>
        <section class="method first-of-group" id="users">
            <div>
                <div class = "method-area">
                    <div class = "method-copy">
                        <div class = "markup">
                            <div class = "method-copy-padding">
                                <PageHeader><small>Users</small></PageHeader>
                                <p>
                                    <code>User</code>
                                    " objects do the following..." [a bit about that]
                                </p>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/user-create
                                </code></pre>
                                <p>
                                    POST request to create a user. Parameters: username, password.
                                </p>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/user-verify
                                </code></pre>
                                <p>
                                    GET request to verify a user.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="method" id="customer_object">

        </section>
        <section class="method" id="create_customer">
        </section>
        <section class="method" id="retrieve_customer">
        </section>
        <section class="method" id="update_customer">
        </section>
        <section class="method" id="delete_customer">
        </section>
        <section class="method" id="list_customers">
        </section>
        <section class="method first-of-group" id="commodities">
            <div>
                <div class = "method-area">
                    <div class = "method-copy">
                        <div class = "markup">
                            <div class = "method-copy-padding">
                                <PageHeader><small>Commodities</small></PageHeader>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/commodities?search=XXX&min_price=XXX&max_price=XXX
                                </code></pre>
                                <p>
                                    GET request to retrieve a commodity based on parameters of __________
                                </p>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/user-verifycommodities?exchange_name=XXX</code></pre>
                                <p>
                                    Creates
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="method first-of-group" id="exchanges">
            <div>
                <div class = "method-area">
                    <div class = "method-copy">
                        <div class = "markup">
                            <div class = "method-copy-padding">
                                <PageHeader><small>Exchanges</small></PageHeader>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/exchanges?search=XXX
                                </code></pre>
                                <p>
                                    Creates
                                </p>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/exchanges?commodity_name=XXX
                                </code></pre>
                                <p>
                                    Creates
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="method first-of-group" id="trading">
            <div>
                <div class = "method-area">
                    <div class = "method-copy">
                        <div class = "markup">
                            <div class = "method-copy-padding">
                                <PageHeader><small>Trading</small></PageHeader>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/buy?commodity_name=XXX&exchange_name=XXX
                                </code></pre>
                                <p>
                                    Returns 0 if insufficient funds, 1 if trade is successful.
                                </p>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/sell?commodity_name=XXX&exchange_name=XXX
                                </code></pre>
                                <p>
                                    Returns 0 if insufficient funds, 1 if trade is successful.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="method first-of-group" id="cool_queries">
            <div>
                <div class = "method-area">
                    <div class = "method-copy">
                        <div class = "markup">
                            <div class = "method-copy-padding">
                                <PageHeader><small>Cool queries</small></PageHeader>
                                <pre class="language-bash"><code class="language-bash">https://btfd.group/arbitrade?commodity_name=XXX
                                </code></pre>
                                <p>
                                    Discover arbitrage opportunities for a particular commodity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="method" id="dispute_object">
        </section>
        <section class="method" id="dispute_evidence_object">
        </section>
        <section class="method" id="retrieve_dispute">
        </section>
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        <br></br>
    </div>


