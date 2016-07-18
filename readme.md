## Myjob [![Build Status](https://travis-ci.org/zifeo/Myjob.svg)](https://travis-ci.org/zifeo/Myjob)

Myjob is a job-offering-seeking web-platform developed by the [general student association](https://agepoly.ch) of [Swiss Federal Institute of Technology in Lausanne (EPFL)](http://www.epfl.ch/index.en.html). 
It aims to facilitate the meeting of employers and skillful EPFL students for experiencing working life aside of their studies (without boring extern website subscriptions). 
The [project](http://myjob.epfl.ch) is maintained by the association IT-team and open source under the [Apache 2.0](./LICENSE) license.

### Installation

Development/Production installation guide and more are available on the [wiki](./wiki).
You can also have a look on `provision.sh` for more information.

### Mottos

- ads creation, modification and full-moderation
- student access for ads viewing and applying
- implicit admin access for moderation
- questions/answers and contact mechanism
- extern ad creation without subscription (managing published ad by mails)
- fully responsive and mobile friendly
- clear and simple interface

### Forking Myjob

When forking Myjob for improvements or your own use you have to consider the following facts:

- project is EPFL-specific but can easily be adapted to your own infrastructure or needs
- current users access is done using a secure and controlled authentication method called [Tequila: Identity Management](https://tequila.epfl.ch), you will have to set up your own Tequila server or use Laravel built-in method
- further EPFL affiliations are prohibited and controlled by swiss federal laws (e.g. you have to get rid of all EPFL related medias)
- further general student association affiliations are prohibited following the same principle

### Support

Any bug, improvement or question is welcomed using the Github issues tool.
