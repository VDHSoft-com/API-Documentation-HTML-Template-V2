# API Documentation HTML Template

### A simple, modern, fully customizable with tags HTML template for your APIs/Webservices documentation

## Current version : 2.0.0

- this is an updated version of Florian Nicolas.

- this version is more customizable thru the use of a xml definition file (see api-definition.xml).
  here is the structure of the xml file :
  
<APIDefinition>
	<MainTitle>API Documentation</MainTitle>
	<TabTitle>API Documentation</TabTitle>
	<Version>2.0.0</Version>
	<Author>VDHSoft (V2)</Author>
	<Copyright>&amp;copy;...</Copyright>
	<ReleasedDate>15th Sep, 2021</ReleasedDate>
	<Description></Description>
	<EMail><![CDATA[<a href="mailto:info@vdhsoft.com">info@vdhsoft.com</a>]]></EMail>
	<Logo>images/logo.png</Logo>
	<HLTheme>dracula.css</HLTheme>
	<HyperLink1><![CDATA[<a href="http://picsoocloud.com/picsooapidemo/" style="color: red;">
  <span style="text-decoration: underline;">PHP real-time demo !</span></a>
  <br>
<div class="info">
	<a href="https://github.com/VDHSoft-com/API-Documentation-HTML-Template-V2">(sources available on github)</a>
</div>
]]></HyperLink1>
	<GithubLink>https://github.com/VDHSoft-com/API-Documentation-HTML-Template-V2</GithubLink>
	<APIfunction id="1">
		<title>GET STARTED</title>
		<source>content-getstarted</source>
		<visible>true</visible>
		<type>html</type>
	</APIfunction>
	<APIfunction id="2">
		<title>Get Characters</title>
		<source>content-getcharacters</source>
		<visible>true</visible>
		<type>html</type>
	</APIfunction>
	<APIfunction id="3">
		<title>ERRORS</title>
		<source>content-errors</source>
		<visible>true</visible>
		<type>html</type>
	</APIfunction>
	...
</APIDefinition>
  
  
- the project uses now `tags`; these tags are processed and the text from the xml file are replaced in the html files; tags available are :
	{{Version}}
	{{Author}}
	{{ReleasedDate}}
	{{MainTitle}}
	{{TabTitle}}
	{{Description}}
	{{Author}}
	{{Logo}}
	{{HLTheme}}
	{{HyperLink1}}
	{{HyperLink2}}
	{{EMail}}
	{{Copyright}}
	{{GithubLink}}
- the `content` is placed is a subdirectory `content` referenced in the xml file.
- the project is splitted into 4 parts : index.php (main), header.php, start-1.php, end-1.php; the context is placed between start-1 and end-1;
  each of the parts can contain the tags.

## Current version : 1.0.5 (from Florian Nicolas)

- this excellent and quite simple version of Florian Nicolas can be found here https://github.com/floriannicolas/API-Documentation-HTML-Template

### What's new in the latest version : 

- Fix list on 3 content columns `<ul>` and `<ol>`.
- Removed `jQuery` usage to vanilla js.
- Update of css fonts.
- Fix menu with long text.
- Updated Google Font call.
- Removed usage of `Roboto Condensed` font.
- Updated `menu` `data-target` to use `content`.
- Added `.central-overflow-x` util class to avoid overflows.
- Added `.break-word` util class to avoir overflows without adding a scrollbar.
- Added optional `Version` & `Last updated` infos
- Added responsive menu with `burger icon` menu button. 


## Credits

* Google Font (Roboto|Source+Code+Pro)
* Highlight.js 9.8.0
* A Creative Common logo: platform by Emily van den Heever from the Noun Project.

## How to use it

This is a simple HTML template, do whatever you want with this !

To use One Content Column Version, don't forget to add ```one-content-column-version``` css class to ```<body>``` like in ```one-content-column.html``` file. 

## Utils CSS class 

If you have an element in central column that overflow on third column, you can add it `central-overflow-x` css class to prevent it.

Example: 
```html
<table class="central-overflow-x">...<table>
```

If you doesn't want a scrollbar, you can use `break-word` css class to prevent it.

Example: 
```html
<code class="higlighted break-word">http://api.westeros.com/with-a-very-very-very-very-very-long-end-point-url/get<table>
```


## Contributors

Special thanks to [TheStami](https://github.com/TheStami) for his contribution creating [One Content Column version](https://ticlekiwi.github.io/API-Documentation-HTML-Template/one-content-column) ! 


## Contribute

We're always looking for:

* Bug reports, especially those for aspects with a reduced test case
* Pull requests for features, spelling errors, clarifications, etc.
* Ideas for enhancements
