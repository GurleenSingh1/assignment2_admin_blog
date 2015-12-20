
		<section id="main" class="grid_9">
			<article id="settings">
				<h1>Settings</h1>
				<form class="uniform">
					
					<div class="tabcontent">
						<div id="general">
							<dl class="inline">
								<dt><label for="site_title">Site Title</label></dt>
								<dd>
									<input type="text" id="site_title" class="medium" />
									<small>The title of your website</small>
								</dd>

								<dt><label for="tagline">Tagline</label></dt>
								<dd>
									<input type="text" id="tagline" class="medium" />
									<small>In a few words, explain what this site is about.</small>
								</dd>

								<dt><label for="site_url">Site URL</label></dt>
								<dd>
									<input type="text" id="site_url" class="medium" />
									<small>Your website address</small>
								</dd>

								<dt><label for="footer_text">Footer Text</label></dt>
								<dd>
									<textarea id="footer_text" class="medium"></textarea>
								</dd>

								<dt><label for="site_logo">Logo</label></dt>
								<dd>
									<input type="file" id="site_logo" />
									<small>Your website logo (jpg, gif, png)</small>
								</dd>
							</dl>
						</div>
						<div id="seo">
							<dl class="inline">
								<dt><label for="site_description">Description</label></dt>
								<dd>
									<textarea id="site_description" class="medium"></textarea>
									<small>The meta description of your website</small>
								</dd>

								<dt><label for="site_keyword">Keywords</label></dt>
								<dd>
									<textarea id="site_keyword" class="medium"></textarea>
									<small>The meta keywords of your website</small>
								</dd>

								<dt><label for="sitemap">Enable Sitemap</label></dt>
								<dd>
									<label><input type="checkbox" id="sitemap" value="1" />Enable</label>
								</dd>
							</dl>
						</div>
						<div id="membership">
							<dl class="inline">
								<dt><label for="admin_email">E-mail address </label></dt>
								<dd>
									<input type="text" id="admin_email" class="medium" />
									<small>This address is used for admin purposes, like new user notification</small>
								</dd>

								<dt><label for="membership2">Membership</label></dt>
								<dd>
									<label><input type="checkbox" id="membership2" value="1" />Anyone can register</label>
								</dd>

								<dt><label for="default_role">Default Role</label></dt>
								<dd>
									<select size="1" id="default_role">
										<option value="1">Administrator</option>
										<option value="2">Editor</option>
										<option value="3">Buyer</option>
										<option value="4">Seller</option>
									</select>
									<small>The default role of new user</small>
								</dd>

								<dt><label for="activation">Member Activation</label></dt>
								<dd>
									<select size="1" id="activation">
										<option value="1">Automatic</option>
										<option value="2">Manual</option>
									</select>
									<small>If manual selected, new users must be approved by admin</small>
								</dd>
							</dl>
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="button">Save Settings</button>
						<button type="button" class="button white">Cancel</button>
					</div>
				</form>
			</article>
		</section>

	
	