@include('Chatify::layouts.headLinks')
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    :root {

        --icon-size: 20px;
        --headers-padding: 1rem;
        --listView-header-height: 110px;

        /* Light theme variables */
        --primary-bg-color: #fff;
        --secondary-bg-color: #f7f7f7;
        --border-color: #eee;
        --messagingView-bg-color: #f6f7f9;
        --scrollbar-thumb-color: #cfcfcf;
        --modal-bg-color: #fff;
        --send-input-icons-color: #4b4b4b;
        --message-hint-bg-color: #ededed;
        --message-hint-color: #4b4b4b;
        --message-card-color: #fff;

        /* Dark theme variables */
        --dark-primary-bg-color: #121212;
        --dark-secondary-bg-color: #202020;
        --dark-border-color: #202020;
        --dark-messagingView-bg-color: #1b1b1b;
        --dark-scrollbar-thumb-color: #212121;
        --dark-modal-bg-color: #1a1a1a;
        --dark-send-input-icons-color: #c8c8c8;
        --dark-message-hint-bg-color: #292929;
        --dark-message-hint-color: #ffffff;
        --dark-message-card-color: #292929;
    }

    /* NProgress background */
    #nprogress .bar {
        background: var(--primary-color) !important;
    }

    #nprogress .peg {
        box-shadow: 0 0 10px var(--primary-color), 0 0 5px var(--primary-color) !important;
    }

    #nprogress .spinner-icon {
        border-top-color: var(--primary-color) !important;
        border-left-color: var(--primary-color) !important;
    }

    /*internet connection*/
    .internet-connection {
        display: none;
        background: rgba(0, 0, 0, 0.76);
        position: absolute;
        bottom: calc(-100% + (var(--headers-padding) + var(--headers-padding)) - 8px);
        /* 8px = 4px padding-top + 4px padding-bottom */
        left: 0;
        right: 0;
        text-align: center;
        padding: 4px;
        color: #fff;
        z-index: 1;
    }

    .internet-connection span {
        display: none;
    }

    /*green background RGBA*/
    .successBG-rgba {
        background: rgba(54, 180, 36, 0.76) !important;
    }

    /* app scroll*/
    .app-scroll::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        border-radius: 4px;
        background: transparent;
        transition: all 0.3s ease;
    }

    .app-scroll-hidden::-webkit-scrollbar {
        width: 0px;
        height: 0px;
    }

    .app-scroll::-webkit-scrollbar-thumb,
    .app-scroll-hidden::-webkit-scrollbar-thumb {
        border-radius: 0px;
    }

    .messenger-headTitle {
        margin: 0rem 0.7rem;
    }

    .messenger {
        display: inline-flex;
        width: 100%;
        height: 100%;
        font-family: sans-serif;
    }

    .messenger-listView {
        display: flex;
        flex-direction: column;
        gap: 5px;
        position: relative;
        top: 0px;
        left: 0px;
        right: 0px;
        z-index: 1;
        background: transparent;
        width: 45%;
        min-width: 200px;
        overflow: auto;
    }

    .messenger-listView .m-header {
        height: var(--listView-header-height);
    }

    .messenger-listView .m-header>nav {
        padding: var(--headers-padding);
    }

    .messenger-messagingView {
        display: flex;
        flex-direction: column;
        gap: 5px;
        overflow: hidden;
        width: 100%;
    }

    .messenger-messagingView .m-header {
        padding: var(--headers-padding);
    }

    .messenger-messagingView .m-body {
        position: relative;
        padding-top: 15px;
        overflow-x: hidden;
        overflow-y: auto;
        height: 100%;
    }

    .m-header {
        font-weight: 600;
        background: transparent;
    }

    .m-header-right {
        display: flex;
        align-items: center;
        gap: 1rem;
        float: right;
    }

    .m-header-messaging {
        position: relative;
        background: #fff;
        box-shadow: 0px 5px 6px rgba(0, 0, 0, 0.06);
    }

    .m-header svg {
        color: var(--primary-color);
        font-size: var(--icon-size);
        transition: transform 0.12s;
    }

    .m-header svg:active {
        transform: scale(0.9);
    }

    .messenger-search[type="text"] {
        margin: 0px 10px;
        width: calc(100% - 20px);
        border: none;
        padding: 8px 10px;
        border-radius: 6px;
        outline: none;
    }

    .messenger-listView-tabs {
        display: inline-flex;
        width: 100%;
        margin-top: 10px;
        background-color: transparent;
        box-shadow: 0px 5px 6px rgba(0, 0, 0, 0.06);
    }

    .messenger-listView-tabs a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        width: 100%;
        text-align: center;
        padding: 10px;
        text-decoration: none;
        background-color: transparent;
        transition: background 0.3s;
    }

    .messenger-listView-tabs a:hover,
    .messenger-listView-tabs a:focus {
        text-decoration: none;
    }

    .messenger-listView-tabs a,
    .messenger-listView-tabs a:hover,
    .messenger-listView-tabs a:focus {
        color: var(--primary-color);
    }

    .active-tab {
        border-bottom: 2px solid var(--primary-color);
    }

    .messenger-tab {
        overflow: auto;
        height: calc(100vh - var(--listView-header-height) - 2px);
        display: none;
        position: relative;
    }

    .add-to-favorite {
        display: none;
    }

    .add-to-favorite svg {
        color: rgba(180, 180, 180, 0.52) !important;
    }

    .favorite-added svg {
        color: #ffc107 !important;
    }

    .favorite svg {
        color: #ffc107 !important;
    }

    .show {
        display: block;
    }

    .hide {
        display: none;
    }

    .messenger-list-item {
        margin: 0;
        width: 100%;
        cursor: pointer;
        transition: background 0.1s;
    }

    .m-list-active span,
    .m-list-active p {
        color: #fff !important;
    }

    .m-list-active,
    .m-list-active:hover,
    .m-list-active:focus {
        background: var(--primary-color) !important;
    }

    .m-list-active b {
        background: #fff !important;
        color: var(--primary-color) !important;
    }

    .m-list-active .activeStatus {
        border-color: var(--primary-color) !important;
    }

    .messenger-list-item td {
        padding: 10px;
    }

    .messenger-list-item tr>td:first-child {
        padding-right: 0;
        width: 55px;
    }

    .messenger-list-item td p {
        margin-bottom: 4px;
        font-size: 14px;
    }

    .messenger-list-item td p span {
        float: right;
    }

    .messenger-list-item td span {
        color: #cacaca;
        font-weight: 400;
        font-size: 12px;
    }

    .messenger-list-item td b {
        float: right;
        color: #fff;
        background: var(--primary-color);
        padding: 0px 4px;
        border-radius: 20px;
        font-size: 13px;
        width: auto;
        height: auto;
        text-align: center;
    }

    .avatar {
        text-align: center;
        border-radius: 100%;
        border: 1px solid;
        overflow: hidden;
        background-image: url("");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .av-l {
        width: 100px;
        height: 100px;
    }

    .av-m {
        width: 45px;
        height: 45px;
    }

    .av-s {
        width: 32px !important;
        height: 32px !important;
    }

    .saved-messages.avatar {
        background-color: transparent;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .saved-messages.avatar>svg {
        font-size: 22px;
        color: var(--primary-color);
    }

    .messenger-list-item.m-list-active .saved-messages.avatar>svg {
        color: #fff;
    }

    .messenger-list-item.m-list-active .saved-messages.avatar {
        border-color: #ffffff81;
    }

    .messenger-favorites {
        padding: 10px;
        overflow: auto;
        white-space: nowrap;
    }

    .messenger-favorites>div {
        display: inline-block;
        text-align: center;
        transition: transform 0.3s;
        cursor: pointer;
    }

    .messenger-favorites>div p {
        font-size: 12px;
        margin: 8px 0px;
        margin-bottom: 0px;
    }

    .messenger-favorites div.avatar {
        border: 2px solid #fff;
        margin: 0px 4px;
        box-shadow: 0px 0px 0px 2px var(--primary-color);
    }

    .messenger-favorites>div:active {
        transform: scale(0.9);
    }

    .messenger-title {
        position: relative;
        margin: 0;
        padding: 10px !important;
        text-transform: capitalize;
        font-size: 12px;
        text-align: center;
        z-index: 1;
    }

    .messenger-title>span {
        position: relative;
        padding: 0px 10px;
        z-index: 1;
    }

    .messenger-title::before {
        content: "";
        display: block;
        width: 100%;
        height: 1px;
        position: absolute;
        bottom: 50%;
        left: 0;
        right: 0;
        z-index: 0;
    }

    .messenger-infoView {
        display: block;
        overflow: auto;
        width: 40%;
        min-width: 200px;
    }

    .messenger-infoView nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: var(--headers-padding);
    }

    .messenger-infoView nav a {
        color: var(--primary-color);
        text-decoration: none;
        font-size: var(--icon-size);
    }

    .messenger-infoView>div {
        margin: auto;
        margin-top: 8%;
        text-align: center;
    }

    .messenger-infoView>p {
        text-align: center;
        margin: auto;
        margin-top: 15px;
        font-size: 18px;
        font-weight: 600;
    }

    .messenger-infoView-btns a {
        display: block;
        text-decoration: none !important;
        padding: 5px 10px;
        margin: 0% 10%;
        border-radius: 3px;
        font-size: 14px;
        transition: background 0.3s;
    }

    .messenger-infoView-btns a.default {
        color: var(--primary-color);
    }

    .messenger-infoView-btns a.default:hover {
        background: #f0f6ff;
    }

    .messenger-infoView-btns a.danger {
        color: #ff5555;
    }

    .messenger-infoView-btns a.danger:hover {
        background: rgba(255, 85, 85, 0.11);
    }

    .shared-photo {
        border-radius: 3px;
        background: #f7f7f7;
        height: 120px;
        overflow: hidden;
        display: inline-block;
        margin: 0px 1px;
        width: calc(50% - 12px);
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    .shared-photo img {
        width: auto;
        height: 100%;
    }

    .messenger-infoView-shared {
        display: none;
    }

    .messenger-infoView-shared .messenger-title {
        padding-bottom: 10px;
    }

    .messenger-infoView-btns .delete-conversation {
        display: none;
    }

    .message-card {
        display: flex;
        flex-direction: row;
        gap: 0.5rem;
        align-items: center;
        width: 100%;
        margin: 2px 15px;
        width: calc(100% - 30px);
        /* 30px = 15px padding left + right */
        justify-content: flex-start;
    }

    .message-card .message-card-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
        max-width: 60%;
    }

    .message-card.mc-sender .message-card-content {
        align-items: end;
    }

    .message-card .image-wrapper .image-file {
        position: relative;
    }

    .message-card .image-wrapper .image-file>div {
        display: none;
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
        background: linear-gradient(0deg,
                rgba(0, 0, 0, 1) 0%,
                rgba(0, 0, 0, 0.5) 100%);
        padding: 0.5rem;
        font-size: 11px;
        color: #fff;
    }

    .message-card-content:hover .image-wrapper .image-file>div {
        display: block;
    }

    .message-card div {
        margin-top: 0px;
    }

    .message-card .message {
        margin: 0;
        padding: 6px 15px;
        padding-bottom: 5px;
        width: fit-content;
        width: -webkit-fit-content;
        border-radius: 20px;
        word-break: break-word;
        display: table-cell;
    }

    .message-card .message-time {
        display: inline-block;
        font-size: 11px;
    }

    .message-card .message .message-time:before {
        content: "";
        background: transparent;
        width: 4px;
        height: 4px;
        display: inline-block;
    }

    .message-card.mc-sender {
        justify-content: flex-end;
    }

    .message-card.mc-sender .message {
        direction: ltr;
        color: #fff !important;
        background: var(--primary-color) !important;
    }

    .message-card.mc-sender .message .message-time {
        color: rgba(255, 255, 255, 0.67);
    }

    .mc-error .message {
        background: rgba(255, 0, 0, 0.27) !important;
        color: #ff0000 !important;
    }

    .mc-error .message .message-time {
        color: #ff0000 !important;
    }

    .messenger-sendCard .send-button svg {
        color: var(--primary-color);
    }

    .listView-x,
    .show-listView {
        display: none;
    }

    .messenger-sendCard {
        display: none;
        margin: 10px;
        margin-bottom: 1rem;
        border-radius: 8px;
        padding-left: 8px;
        padding-right: 8px;
    }

    .messenger-sendCard form {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .messenger-sendCard input[type="file"] {
        display: none;
    }

    .messenger-sendCard button,
    .messenger-sendCard button:active,
    .messenger-sendCard button:focus {
        border: none;
        outline: none;
        background: none;
        padding: 0;
        margin: 0;
    }

    .messenger-sendCard label {
        margin: 0;
    }

    .messenger-sendCard svg {
        margin: 9px 10px;
        color: #bdcbd6;
        cursor: pointer;
        font-size: 21px;
        transition: transform 0.15s;
    }

    .messenger-sendCard svg:active {
        transform: scale(0.9);
    }

    .m-send {
        font-size: 14px;
        width: 100%;
        border: none;
        padding: 10px;
        outline: none;
        resize: none;
        background: transparent;
        font-family: sans-serif;
        height: 44px;
        max-height: 200px;
    }

    .attachment-preview {
        position: relative;
        padding: 10px;
    }

    .attachment-preview>p {
        margin: 0;
        font-size: 12px;
        padding: 0px;
        padding-top: 10px;
    }

    .attachment-preview>p>svg {
        font-size: 16px;
        margin: 0;
        margin-bottom: -1px;
        color: #737373;
    }

    .attachment-preview svg:active {
        transform: none;
    }

    .message-card .image-file,
    .attachment-preview .image-file {
        cursor: pointer;
        width: 140px;
        height: 70px;
        border-radius: 6px;
        width: 260px;
        height: 170px;
        overflow: hidden;
        background-color: #f7f7f7;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .attachment-preview>svg:first-child {
        position: absolute;
        background: rgba(0, 0, 0, 0.33);
        width: 20px;
        height: 20px;
        padding: 3px;
        border-radius: 100%;
        font-size: 16px;
        margin: 0;
        top: 10px;
        color: #fff;
    }

    #message-form>button {
        height: 40px;
    }

    .file-download {
        font-size: 12px;
        display: block;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid rgba(0, 0, 0, 0.08);
        background: rgba(0, 0, 0, 0.03);
        padding: 2px 8px;
        margin-top: 10px;
        border-radius: 20px;
        transition: transform 0.3s, background 0.3s;
    }

    .file-download:hover,
    .file-download:focus {
        color: #fff;
        text-decoration: none;
        background: rgba(0, 0, 0, 0.08);
    }

    .file-download:active {
        transform: scale(0.95);
    }

    .typing-indicator {
        display: none;
    }

    .messages {
        padding: 5px 0px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .message-hint {
        margin: 0;
        text-align: center;
    }

    .center-el {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .message-hint span {
        padding: 3px 10px;
        border-radius: 20px;
        display: inline-block;
    }

    .upload-avatar-details {
        font-size: 14px;
        color: #949ba5;
        display: none;
    }

    .upload-avatar-preview {
        position: relative;
        border: 1px solid #e0e0e0;
        margin: 20px auto;
    }

    .upload-avatar-loading {
        position: absolute;
        top: calc(50% - 21px);
        margin: 0;
        left: calc(50% - 20px);
    }

    .divider {
        margin: 15px;
    }

    .update-messengerColor {
        margin: 1rem 0rem;
    }

    .update-messengerColor .color-btn {
        width: 30px;
        height: 30px;
        border-radius: 20px;
        display: inline-block;
        cursor: pointer;
    }

    .m-color-active {
        border: 3px solid rgba(255, 255, 255, 0.5);
    }

    .update-messengerColor .color-btn {
        transition: transform 0.15s, border 0.15s;
    }

    .update-messengerColor .color-btn:active {
        transform: scale(0.9);
    }

    .dark-mode-switch {
        margin: 0px 5px;
        cursor: pointer;
        color: var(--primary-color);
    }

    .activeStatus {
        width: 12px;
        height: 12px;
        background: #4caf50;
        border-radius: 20px;
        position: absolute;
        bottom: 12%;
        right: 6%;
        transition: border 0.1s;
    }

    .lastMessageIndicator {
        color: var(--primary-color) !important;
    }



    .app-btn {
        cursor: pointer;
        border: none;
        padding: 3px 15px;
        border-radius: 20px;
        margin: 1px;
        font-size: 14px;
        display: inline-block;
        outline: none;
        text-decoration: none;
        transition: all 0.3s;
        color: rgb(33, 128, 243);
    }

    .app-btn:hover,
    .app-btn:focus {
        color: rgb(33, 128, 243);
        outline: none;
        text-decoration: none;
    }

    .app-btn:active {
        transform: scale(0.9);
    }

    .a-btn-light {
        background: #f1f1f1;
        color: #333;
    }

    .a-btn-light:hover,
    .a-btn-light:focus {
        color: #333;
        background: #e4e4e4;
    }

    .a-btn-primary {
        background: #0976d6;
        color: #fff;
    }

    .a-btn-primary:hover,
    .a-btn-primary:focus {
        background: #0085ef;
        color: #fff;
    }

    .a-btn-warning {
        background: #ffc107;
        color: #fff;
    }

    .a-btn-warning:hover,
    .a-btn-warning:focus {
        background: #ffa726;
        color: #fff;
    }

    .a-btn-success {
        background: #1e8a53 !important;
        color: #fff;
    }

    .a-btn-success:hover,
    .a-btn-success:focus {
        background: #2ecc71 !important;
        color: #fff;
    }

    .a-btn-danger {
        background: #ea1909 !important;
        color: #fff;
    }

    .a-btn-danger:hover,
    .a-btn-danger:focus {
        color: #fff;
        background: #b70d00 !important;
    }

    .btn-disabled {
        opacity: 0.5;
    }



    .app-modal {
        display: none;
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.53);
        z-index: 50;
    }

    .app-modal-container {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .app-modal-card {
        width: auto;
        max-width: 400px;
        margin: auto;
        padding: 20px 40px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.27);
        transform: scale(0);
    }

    .app-modal-header {
        font-weight: 500;
    }

    .app-modal-footer {
        margin-top: 10px;
    }

    .app-show-modal {
        transform: scale(1);
        animation: show_modal 0.15s;
    }

    /* modal animation */
    @keyframes show_modal {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }



    .loadingPlaceholder-wrapper {
        position: relative;
    }

    .loadingPlaceholder-body div,
    .loadingPlaceholder-header tr td div {
        background-repeat: no-repeat;
        background-size: 800px 104px;
        height: 104px;
        position: relative;
    }

    .loadingPlaceholder-body div {
        position: absolute;
        right: 0px;
        left: 0px;
        top: 0px;
    }

    div.loadingPlaceholder-avatar {
        height: 45px !important;
        width: 45px;
        margin: 10px;
        border-radius: 60px;
    }

    div.loadingPlaceholder-name {
        height: 15px !important;
        margin-bottom: 10px;
        width: 150px;
        border-radius: 2px;
    }

    div.loadingPlaceholder-date {
        height: 10px !important;
        width: 106px;
        border-radius: 2px;
    }



    .imageModal {
        display: none;
        position: fixed;
        z-index: 50;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.9);
    }

    .imageModal-content {
        margin: auto;
        display: block;
        height: calc(100vh - 150px);
    }

    .imageModal-content {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.15s;
        animation-name: zoom;
        animation-duration: 0.15s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0);
        }

        to {
            -webkit-transform: scale(1);
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    .imageModal-close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .imageModal-close:hover,
    .imageModal-close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /*

    .dot {
        width: 8px;
        height: 8px;
        background: #bcc1c6;
        display: inline-block;
        border-radius: 50%;
        right: 0px;
        bottom: 0px;
        position: relative;
        animation: jump 1s infinite;
    }

    .typing-dots .dot-1 {
        -webkit-animation-delay: 100ms;
        animation-delay: 100ms;
    }

    .typing-dots .dot-2 {
        -webkit-animation-delay: 200ms;
        animation-delay: 200ms;
    }

    .typing-dots .dot-3 {
        -webkit-animation-delay: 300ms;
        animation-delay: 300ms;
    }

    @keyframes jump {
        0% {
            bottom: 0px;
        }

        20% {
            bottom: 5px;
        }

        40% {
            bottom: 0px;
        }
    }

    /*

    @media (max-width: 1060px) {
        .messenger-infoView {
            position: fixed;
            right: 0;
            top: 0;
            bottom: 0;
            max-width: 334px;
        }
    }

    @media (max-width: 980px) {
        .messenger-listView.conversation-active {
            display: none;
        }

        .messenger-listView {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            max-width: 334px;
        }

        .listView-x {
            display: block;
        }

        .show-listView {
            display: inline-block;
        }
    }

    @media (max-width: 680px) {
        .messenger-messagingView {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
        }

        .messenger-infoView {
            display: none;
            width: 100%;
            max-width: unset;
        }

        .messenger-listView {
            width: 100%;
            max-width: unset;
        }

        .listView-x {
            display: none;
        }

        .app-modal-container {
            transform: unset;
        }

        .app-modal-card {
            max-width: unset;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            border-radius: 0px;
        }
    }

    @media (min-width: 680px) {
        .messenger-listView {
            display: unset;
        }
    }

    @media only screen and (max-width: 700px) {
        .imageModal-content {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .user-name {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }

        .chatify-md-block {
            display: block;
        }
    }

    .chatify-d-flex {
        display: flex !important;
    }

    .chatify-d-none {
        display: none !important;
    }

    .chatify-d-hidden {
        visibility: hidden !important;
    }

    .chatify-justify-content-between {
        justify-content: space-between !important;
    }

    .chatify-align-items-center {
        align-items: center !important;
    }

    .chat-message-wrapper {
        display: flex;
        flex-direction: column;
        align-items: end;
        unicode-bidi: bidi-override;
        direction: ltr;
    }

    .pb-3 {
        padding-bottom: 0.75rem;
        /* 12px */
    }

    .mb-2 {
        margin-bottom: 0.5rem;
        /* 8px */
    }

    .messenger [type="text"]:focus {
        outline: 1px solid var(--primary-color);
        border-color: var(--primary-color) !important;
        border-color: var(--primary-color);
        box-shadow: 0 0 2px var(--primary-color);
    }

    .messenger textarea:focus {
        outline: none;
        border: none;
        box-shadow: none;
    }

    .message-card .actions {
        opacity: 0.6;
    }

    .message-card .actions .delete-btn {
        display: none;
        cursor: pointer;
        color: #333333;
    }

    .message-card:hover .actions .delete-btn {
        display: block;
    }



    .emoji-picker__emojis::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        border-radius: 4px;
        background: transparent;
        transition: all 0.3s ease;
    }

    .emoji-picker__emojis::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background: transparent;
    }
</style>

<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
            {{-- Lists [Users/Group] --}}
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="show messenger-tab users-tab app-scroll" data-view="users">
                {{-- Favorites --}}
                <div class="favorites-section">
                    <p class="messenger-title"><span>Favorites</span></p>
                    <div class="messenger-favorites app-scroll-hidden"></div>
                </div>
                {{-- Saved Messages --}}
                <p class="messenger-title"><span>Your Space</span></p>
                {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                {{-- Contact --}}
                <p class="messenger-title"><span>All Messages</span></p>
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
            </div>
            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title"><span>Search</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar"
                        style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <p>User Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
