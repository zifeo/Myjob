<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Montserrat:400);
        body {
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }
        h1 {
            text-size: 8px !important;
        }
        #mail {	background: #f0f0f0;
            font-family: 'Helvetica Neue', helvetica, sans-serif;
            font-size: 13px;
        }
        .title {
            font-size: 1.1em;
            padding: 0;
            margin: 0;
            font-family: 'Montserrat', inherit;
            font-weight: 400;
        }
        #mail td {
            padding: 15px;
        }
        #mail td td {
            padding: 0;
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        .fright {
            float: right;
        }
        #red {
            background: #c61618;
        }
        td#menu {
            padding: 5px;
        }
        #elements {
            margin: 0 auto;
            padding: 0 15px;
            max-width: 800px;
            color: #ffffff;
        }
        .spacer {
            margin-bottom: 15px;
        }
        #corps {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 15px;
        }
        #ad {
            background: #ffffff;
            box-shadow: 0 1px 3px 0 #bcbdbd,0 0 0 1px #d4d4d5;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            margin: 0 0 15px 0;
        }
        #footer {
            border-top: 1px solid #dddddd;
        }
        a.button {
            background-color: #c61618;
            border-radius: 5px;
            text-align: center;
            padding: 8px 10px;
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
            font-family: 'Montserrat', inherit;
            border: 2px solid #c61618;
            font-size: 0.9em;
        }
        a.inverted {
            border-color: #ffffff;
            background: transparent;
        }
        a {
            text-decoration: none;
            color: rgba(0, 0, 0, .8);
        }
    </style>
</head>
<body>
<table id="mail" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td class="center">
            <a href="{{ action('HomeController@index') }}">
                <img width="360" height="60" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FscXVlXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjY3LjggMTExIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2NjcuOCAxMTEiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIGZpbGw9IiNDNjE2MTgiIGQ9Ik00MDUuMyw3Ny45Yy0zLjYsMC02LjctMS4yLTkuMi0zLjdjLTIuNS0yLjUtMy43LTUuNi0zLjctOS4yYzAtMi40LDAuNi00LjUsMS43LTYuNWMyLjQtNC4zLDYuMi02LjQsMTEuMi02LjRoMTIuOXYtNi40YzAtMS44LTAuNi0zLjMtMS44LTQuNWMtMS4yLTEuMi0yLjgtMS44LTQuNi0xLjhoLTEyLjhjLTIuMiwwLTMuMy0xLjEtMy4zLTMuMmMwLTIuMiwxLjEtMy4yLDMuMy0zLjJoMTIuOWMzLjYsMCw2LjcsMS4yLDkuMSwzLjdjMi41LDIuNSwzLjcsNS41LDMuNyw5LjJ2MjljMCwyLjEtMS4xLDMuMi0zLjIsMy4yTDQwNS4zLDc3LjlMNDA1LjMsNzcuOXogTTQxOC4xLDU4LjVoLTEyLjljLTEuOCwwLTMuMywwLjYtNC42LDEuOWMtMS4zLDEuMy0xLjksMi44LTEuOSw0LjZjMCwxLjgsMC42LDMuMywxLjksNC41YzEuMywxLjMsMi44LDEuOSw0LjUsMS45aDEyLjlMNDE4LjEsNTguNUw0MTguMSw1OC41eiIvPjxwYXRoIGZpbGw9IiNDNjE2MTgiIGQ9Ik00NjIuNCwzMi44YzIuMSwwLDMuMiwxLjEsMy4yLDMuMnY0OC40YzAsMy42LTEuMiw2LjctMy43LDkuMmMtMi41LDIuNS01LjUsMy43LTkuMSwzLjdoLTEyLjljLTIuMiwwLTMuMy0xLjEtMy4zLTMuMmMwLTIuMiwxLjEtMy4yLDMuMy0zLjJoMTIuOGMxLjgsMCwzLjMtMC42LDQuNS0xLjljMS4yLTEuMywxLjktMi44LDEuOS00LjZ2LTYuNGgtMTIuOWMtNSwwLTguNy0yLjEtMTEuMi02LjRjLTEuMS0yLTEuNy00LjItMS43LTYuNVY0NS43YzAtMy42LDEuMi02LjcsMy43LTkuMmMyLjUtMi41LDUuNS0zLjcsOS4yLTMuN0w0NjIuNCwzMi44TDQ2Mi40LDMyLjh6IE00NTkuMSwzOS4zaC0xMi45Yy0xLjgsMC0zLjMsMC42LTQuNiwxLjljLTEuMywxLjItMS45LDIuOC0xLjksNC42VjY1YzAsMS44LDAuNiwzLjMsMS45LDQuNWMxLjMsMS4zLDIuOCwxLjksNC41LDEuOWgxMi45TDQ1OS4xLDM5LjNMNDU5LjEsMzkuM3oiLz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNNDgwLjksNTguNVY2NWMwLDEuOCwwLjYsMy4zLDEuOSw0LjVjMS4zLDEuMywyLjgsMS45LDQuNSwxLjloMTYuMWMyLjEsMCwzLjIsMS4xLDMuMiwzLjJjMCwyLjItMS4xLDMuMi0zLjIsMy4yaC0xNi4xYy0zLjYsMC02LjctMS4yLTkuMi0zLjdjLTIuNS0yLjUtMy43LTUuNS0zLjctOS4yVjQ4LjljMC00LjUsMS42LTguMyw0LjctMTEuNGMzLjEtMy4xLDYuOS00LjcsMTEuNC00LjdjNC41LDAsOC4zLDEuNiwxMS41LDQuN2MzLjEsMy4xLDQuNyw2LjksNC43LDExLjR2OS43TDQ4MC45LDU4LjVMNDgwLjksNTguNXogTTQ5MC41LDM5LjNjLTIuNywwLTQuOSwwLjktNi44LDIuOGMtMS45LDEuOS0yLjgsNC4xLTIuOCw2LjhWNTJoMTkuMnYtMy4yYzAtMi42LTAuOS00LjktMi44LTYuOEM0OTUuNCw0MC4yLDQ5My4yLDM5LjMsNDkwLjUsMzkuM3oiLz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNNTE1LjQsMzZjMC0yLjEsMS4xLTMuMiwzLjItMy4yaDE2LjFjMy42LDAsNi43LDEuMiw5LjIsMy43YzIuNSwyLjUsMy43LDUuNSwzLjcsOS4yVjY1YzAsMy42LTEuMiw2LjYtMy43LDkuMWMtMi41LDIuNS01LjUsMy44LTkuMSwzLjhoLTEyLjlWOTRjMCwyLjItMS4xLDMuMi0zLjIsMy4yYy0yLjIsMC0zLjItMS4xLTMuMi0zLjJMNTE1LjQsMzZMNTE1LjQsMzZ6IE01MjEuOSwzOS4zdjMyLjFoMTIuOGMxLjgsMCwzLjMtMC42LDQuNS0xLjljMS4yLTEuMiwxLjktMi44LDEuOS00LjZWNDUuN2MwLTEuOC0wLjYtMy4zLTEuOC00LjZjLTEuMi0xLjItMi44LTEuOC00LjYtMS44QzUzNC43LDM5LjMsNTIxLjksMzkuMyw1MjEuOSwzOS4zeiIvPjxwYXRoIGZpbGw9IiNDNjE2MTgiIGQ9Ik01NTYuNCw2MS44VjQ4LjljMC00LjUsMS42LTguMyw0LjctMTEuNGMzLjEtMy4xLDYuOS00LjcsMTEuNC00LjdjNC41LDAsOC4zLDEuNiwxMS41LDQuN2MzLjEsMy4xLDQuNyw2LjksNC43LDExLjV2MTIuOWMwLDQuNS0xLjYsOC4zLTQuNywxMS40Yy0zLjEsMy4xLTYuOSw0LjctMTEuNCw0LjdjLTQuNSwwLTguMy0xLjYtMTEuNC00LjdDNTU4LDcwLDU1Ni40LDY2LjIsNTU2LjQsNjEuOHogTTU4Mi4yLDYxLjhWNDguOWMwLTIuNy0wLjktNC45LTIuOC02LjhzLTQuMS0yLjgtNi44LTIuOGMtMi43LDAtNC45LDAuOS02LjgsMi44Yy0xLjksMS45LTIuOCw0LjItMi44LDYuOHYxMi45YzAsMi43LDAuOSw1LDIuOCw2LjhjMS45LDEuOSw0LjEsMi44LDYuOCwyLjhjMi43LDAsNC45LTAuOSw2LjgtMi44QzU4MS4yLDY2LjcsNTgyLjIsNjQuNCw1ODIuMiw2MS44eiIvPjxwYXRoIGZpbGw9IiNDNjE2MTgiIGQ9Ik01OTcuNCwxNi42YzAtMi4xLDEuMS0zLjIsMy4yLTMuMmMyLjIsMCwzLjIsMS4xLDMuMiwzLjJ2NTEuNmMwLDEuNywxLjEsMi43LDMuMiwzLjJjMi4xLDAuNSwzLjIsMS42LDMuMiwzLjJjMCwyLjItMS4xLDMuMi0zLjIsMy4yYy0yLjksMC01LjItMC45LTctMi42Yy0xLjgtMS43LTIuNy00LjEtMi43LTcuMUw1OTcuNCwxNi42TDU5Ny40LDE2LjZ6Ii8+PHBhdGggZmlsbD0iI0M2MTYxOCIgZD0iTTYyNi41LDkwLjhsNS40LTE2LjJMNjE5LjQsMzdjLTAuMi0wLjQtMC4yLTAuNy0wLjItMWMwLTIuMiwxLjEtMy4yLDMuMy0zLjJjMS42LDAsMi42LDAuNywzLjEsMi4ybDkuNywyOS40TDY0NSwzNWMwLjUtMS41LDEuNS0yLjIsMy4xLTIuMmMyLjIsMCwzLjIsMS4xLDMuMiwzLjJjMCwwLjMtMC4xLDAuNi0wLjIsMWwtMTkuMyw1OGMtMC41LDEuNS0xLjUsMi4yLTMuMSwyLjJoLTYuNWMtMi4xLDAtMy4yLTEuMS0zLjItMy4yYzAtMS43LDAuOS0yLjgsMi43LTMuMUM2MjIuMSw5MC44LDYyMy43LDkwLjgsNjI2LjUsOTAuOHoiLz48L2c+PGc+PGc+PHBhdGggZmlsbD0iIzE0NzVBMSIgZD0iTTM0Mi42LDQ5LjJjLTQsNC04LjksNi0xNC42LDZjLTUuOCwwLTEwLjYtMi0xNC43LTZsMCwwYzMuNi00LDguOC02LjUsMTQuNi02LjVDMzMzLjgsNDIuNywzMzksNDUuMiwzNDIuNiw0OS4yIi8+PHBhdGggZmlsbD0iIzE0NzVBMSIgZD0iTTMxOS4yLDM1LjZjLTIuOCw0LjMtNi4xLDcuMS05LjgsOC4zYy0xLjQtMi45LTIuMi02LTIuMi05LjRjMC01LjcsMi0xMC43LDYtMTQuOGMzLjMtMy4zLDcuMy01LjMsMTEuOS01LjlDMzI1LjIsMjIuNCwzMjMuMiwyOS43LDMxOS4yLDM1LjZ6Ii8+PHBhdGggZmlsbD0iIzE0NzVBMSIgZD0iTTMzMC43LDEzLjhjNC42LDAuNiw4LjYsMi42LDExLjksNS45YzQsNC4xLDYsOSw2LDE0LjhjMCwzLjQtMC43LDYuNi0yLjIsOS40Yy0zLjctMS4yLTctNC05LjgtOC4zQzMzMi43LDI5LjcsMzMwLjcsMjIuNCwzMzAuNywxMy44eiIvPjwvZz48Zz48cGF0aCBmaWxsPSIjNUZBNUMxIiBkPSJNMzMyLDgxLjhjLTEuNS01LjUtMC44LTEwLjcsMi4xLTE1LjZjMi45LTUsNy04LjIsMTIuNS05LjdsMCwwYzEuNyw1LjEsMS4yLDEwLjktMS43LDE1LjlDMzQyLjEsNzcuMywzMzcuMyw4MC42LDMzMiw4MS44Ii8+PHBhdGggZmlsbD0iIzVGQTVDMSIgZD0iTTM1NS41LDY4LjNjLTIuMy00LjYtMy4xLTguOC0yLjMtMTIuN2MzLjIsMC4yLDYuMywxLjEsOS4zLDIuOGM1LDIuOSw4LjIsNy4xLDkuOCwxMi42YzEuMiw0LjYsMSw5LTAuOCwxMy4zQzM2NCw4MCwzNTguNiw3NC43LDM1NS41LDY4LjN6Ii8+PHBhdGggZmlsbD0iIzVGQTVDMSIgZD0iTTM2OC43LDg5LjFjLTIuOCwzLjctNi41LDYuMS0xMS4xLDcuNGMtNS42LDEuNC0xMC44LDAuNy0xNS44LTIuMWMtMy0xLjctNS4zLTMuOS03LjEtNi42YzIuOS0yLjYsNi45LTQuMSwxMi4xLTQuNEMzNTMuOSw4Mi45LDM2MS4yLDg0LjgsMzY4LjcsODkuMXoiLz48L2c+PGc+PHBhdGggZmlsbD0iI0I2RDNEQiIgZD0iTTMwOS4xLDU2LjRjNS41LDEuNSw5LjYsNC43LDEyLjUsOS42YzIuOSw1LDMuNiwxMC4yLDIuMiwxNS43djBjLTUuMy0xLjEtMTAuMS00LjQtMTMtOS40QzMwNy45LDY3LjMsMzA3LjUsNjEuNSwzMDkuMSw1Ni40Ii8+PHBhdGggZmlsbD0iI0I2RDNEQiIgZD0iTTMwOS4xLDgzLjRjNS4yLDAuMyw5LjIsMS43LDEyLjEsNC40Yy0xLjgsMi43LTQuMSw0LjktNy4xLDYuNmMtNSwyLjktMTAuMiwzLjYtMTUuOCwyLjJjLTQuNi0xLjItOC4zLTMuNy0xMS4xLTcuM0MyOTQuNiw4NC45LDMwMS45LDgyLjksMzA5LjEsODMuNHoiLz48cGF0aCBmaWxsPSIjQjZEM0RCIiBkPSJNMjg0LjQsODQuNGMtMS44LTQuMy0yLjEtOC43LTAuOS0xMy4zYzEuNS01LjUsNC44LTkuNyw5LjctMTIuNmMzLTEuNyw2LTIuNyw5LjMtMi45YzAuOCwzLjgsMC4xLDgtMi4yLDEyLjdDMjk3LjIsNzQuNywyOTEuOSw4MC4xLDI4NC40LDg0LjR6Ii8+PC9nPjwvZz48Zz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNMTkuNCw3Ny44VjMzLjNoOS40djhjMS4zLTIuNywzLjQtNC44LDYuMS02LjNjMi43LTEuNSw1LjYtMi4zLDguOC0yLjNjNywwLDExLjgsMi45LDE0LjMsOC42YzQuNC01LjcsOS45LTguNiwxNi41LTguNmM1LDAsOS4xLDEuNSwxMi4yLDQuNnM0LjcsNy41LDQuNywxMy4zdjI3LjNoLTkuM1Y1My4zYzAtOC4yLTMuNC0xMi4zLTEwLjItMTIuM2MtMy4yLDAtNiwxLTguMywzLjFzLTMuNiw1LTMuNyw5djI0LjhoLTkuNFY1My4zYzAtNC4zLTAuOC03LjQtMi4zLTkuNGMtMS41LTItMy45LTMtNy4xLTNzLTYuMSwxLjEtOC41LDMuMnMtMy42LDUuMy0zLjYsOS40djI0LjJMMTkuNCw3Ny44TDE5LjQsNzcuOHoiLz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNOTguMSwzMy4zaDEwbDEzLjMsMzIuOGwxMy4zLTMyLjhoMTBsLTIxLjYsNTIuOWMtMS4zLDIuOS0zLjEsNS4yLTUuNSw2LjhjLTIuNCwxLjctNS4xLDIuNS03LjksMi41Yy00LjEsMC03LjgtMS41LTExLTQuNGw0LjItNy42YzIsMS45LDQsMi44LDYuMSwyLjhzMy44LTAuOCw1LjEtMi4zYzEuMy0xLjUsMi0zLjIsMi00LjlDMTE2LjEsNzguMywxMTAuMSw2My4xLDk4LjEsMzMuM3oiLz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNMTM2LjEsOTEuM2w0LjMtNi45YzEuOSwxLjksMy44LDIuOCw1LjcsMi44YzAsMCwwLjEsMCwwLjEsMGMxLjksMCwzLjQtMC43LDQuNC0xLjljMS0xLjIsMS41LTIuOSwxLjUtNS4xVjMzLjNoOS40djQ2LjljMCw0LjctMS40LDguNC00LjIsMTEuMmMtMi44LDIuOC02LjIsNC4xLTEwLjIsNC4xQzE0My4xLDk1LjYsMTM5LjQsOTQuMSwxMzYuMSw5MS4zeiBNMTUyLjUsMjQuNWMtMS4yLTEuMi0xLjgtMi42LTEuOC00LjJzMC42LTMsMS44LTQuMnMyLjYtMS44LDQuMi0xLjhjMS42LDAsMywwLjYsNC4yLDEuOGMxLjIsMS4yLDEuOCwyLjYsMS44LDQuMnMtMC42LDMtMS44LDQuMmMtMS4yLDEuMi0yLjYsMS44LTQuMiwxLjhDMTU1LjEsMjYuMiwxNTMuNywyNS42LDE1Mi41LDI0LjV6Ii8+PHBhdGggZmlsbD0iI0M2MTYxOCIgZD0iTTIxOC45LDc3LjhWMTUuOWg5LjR2MjUuNGMzLjctNS43LDguNS04LjYsMTQuNS04LjZjNiwwLDExLjEsMi4xLDE1LjMsNi4yYzQuMiw0LjIsNi4zLDkuNyw2LjMsMTYuNWMwLDYuOC0yLjEsMTIuNC02LjMsMTYuN3MtOS4xLDYuNC0xNC43LDYuNHMtMTAuNi0yLjUtMTUuMS03LjN2Ni43TDIxOC45LDc3LjhMMjE4LjksNzcuOEwyMTguOSw3Ny44eiBNMjMxLjksNDUuMmMtMi42LDIuOC0zLjksNi4zLTMuOSwxMC41czEuMyw3LjcsMy45LDEwLjRjMi42LDIuNyw1LjcsNCw5LjQsNGMzLjcsMCw2LjktMS4zLDkuNi00YzIuNy0yLjcsNC4xLTYuMSw0LjEtMTAuNHMtMS4zLTcuOC00LTEwLjZjLTIuNy0yLjgtNS45LTQuMi05LjYtNC4yQzIzNy42LDQxLDIzNC41LDQyLjQsMjMxLjksNDUuMnoiLz48cGF0aCBmaWxsPSIjQzYxNjE4IiBkPSJNMjA2LjksNzEuOGM0LjUtNC40LDYuNy05LjgsNi43LTE2LjNzLTIuMi0xMS44LTYuNy0xNi4zYy00LjUtNC40LTEwLTYuNi0xNi43LTYuNmMtNi43LDAtMTIuMywyLjItMTYuNyw2LjZjLTQuNSw0LjQtNi43LDkuOC02LjcsMTYuM3MyLjIsMTEuOCw2LjcsMTYuM2M0LjUsNC40LDEwLDYuNiwxNi43LDYuNmMzLDAsNS44LTAuNSw4LjQtMS40bDUuOCwxMGw1LjUtMy4ybC01LjctOS44QzIwNS4xLDczLjQsMjA2LDcyLjcsMjA2LjksNzEuOHogTTE4MC4xLDY2LjFjLTIuNi0yLjctNC02LjItNC0xMC41czEuMy03LjgsNC0xMC41YzIuNi0yLjcsNi00LjEsMTAuMS00LjFzNy40LDEuNCwxMC4xLDQuMWMyLjcsMi43LDQsNi4yLDQsMTAuNXMtMS4zLDcuOC00LDEwLjVjLTIuNywyLjctNiw0LjEtMTAuMSw0LjFTMTgyLjcsNjguOCwxODAuMSw2Ni4xeiIvPjxyZWN0IHg9IjIwMC44IiB5PSI5MC4xIiB0cmFuc2Zvcm09Im1hdHJpeCgtMC41IC0wLjg2NiAwLjg2NiAtMC41IDIzNi40NDYgMzI5LjI1NTEpIiBmaWxsPSIjMDEwMjAyIiB3aWR0aD0iMjUiIGhlaWdodD0iMTIuNiIvPjwvZz48L3N2Zz4=" alt="Myjob">
            </a>
        </td>
    </tr>
    <tr id="red">
        <td id="menu">
            <table id="elements" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="title">
                        @yield('title')
                    </td>
                    <td class="right">
                        <a class="inverted button" href="{{ action('HomeController@index') }}">{{ trans('mails.notifications.gotomyjob') }}</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @yield('content')
    <tr id="footer">
        <td class="center">
            <p>
                <a href="https://agepoly.ch">AGEPINFO</a> 2015 · <a href="{{ action('OptionsController@index') }}">{{ trans('mails.notifications.options') }}</a><br>
            </p>
        </td>
    </tr>
</table>
</body>
</html>
