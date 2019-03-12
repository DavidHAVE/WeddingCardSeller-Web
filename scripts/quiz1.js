/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
'use strict';

// Initializes FriendlyChat.
function HeroesApp() {
  this.checkSetup();

  // Shortcuts to DOM Elements.
   this.messageList = document.getElementById('messages');
 this.messageForm = document.getElementById('message-form');
  this.nomorInput = document.getElementById('nomorInput');
  this.pertanyaanInput = document.getElementById('pertanyaanInput');
this.soal1Input = document.getElementById('soal1Input');
this.soal2Input = document.getElementById('soal2Input');
this.soal3Input = document.getElementById('soal3Input');
this.soal4Input = document.getElementById('soal4Input');
this.jawabanInput = document.getElementById('jawabanInput');

// var kMakanan = document.getElementByName('kualitasMakanan');


this.submitButton = document.getElementById('submit');


  // this.submitImageButton = document.getElementById('submitImage');
  //
  // this.imageForm = document.getElementById('image-form');
  // this.mediaCapture = document.getElementById('mediaCapture');
  // this.userPic = document.getElementById('user-pic');
  // this.userName = document.getElementById('user-name');
  // this.signInButton = document.getElementById('sign-in');
  // this.signOutButton = document.getElementById('sign-out');
  // this.signInSnackbar = document.getElementById('must-signin-snackbar');

  // Saves message on form submit.
  this.messageForm.addEventListener('submit', this.saveMessage.bind(this));
  // this.signOutButton.addEventListener('click', this.signOut.bind(this));
  // this.signInButton.addEventListener('click', this.signIn.bind(this));

  // Toggle for the button.
  var buttonTogglingHandler = this.toggleButton.bind(this);
  this.pertanyaanInput.addEventListener('keyup', buttonTogglingHandler);
  this.pertanyaanInput.addEventListener('change', buttonTogglingHandler);

  // // Events for image upload.
  // this.submitImageButton.addEventListener('click', function(e) {
  //   e.preventDefault();
  //   this.mediaCapture.click();
  // }.bind(this));
  // this.mediaCapture.addEventListener('change', this.saveImageMessage.bind(this));

  this.initFirebase();
}

// Sets up shortcuts to Firebase features and initiate firebase auth.
HeroesApp.prototype.initFirebase = function() {
  // Shortcuts to Firebase SDK features.
  this.auth = firebase.auth();
  this.database = firebase.database();
  this.storage = firebase.storage();
  // Initiates Firebase auth and listen to auth state changes.
  // this.auth.onAuthStateChanged(this.onAuthStateChanged.bind(this));
this.messagesRef = this.database.ref('quiz');
  this.loadMessages();
  //
       this.saveMessagingDeviceToken();
};

// Saves a new message on the Firebase DB.
HeroesApp.prototype.saveMessage = function(e) {
  e.preventDefault();
  // Check that the user entered a message and is signed in.
  if (this.pertanyaanInput.value) {

 // var typeChck = parseInt(document.querySelector('input[name="tipeMakanan"]:checked').value);
 // var qualityChck = parseInt(document.querySelector('input[name="kualitasMakanan"]:checked').value);

    // var kualMakanan;
    //
    // for (var i = 0, length = kMakanan.length; i < length; i++){
    //   if(kMakanan[i].checked){
    //     alert(kMakanan[i].value);
    //     kualMakanan = kMakanan[i].value;
    //     break;
    //   }
    // }


    // var currentUser = this.auth.currentUser;
    // Add a new message entry to the Firebase Database.
    this.messagesRef.push({
     // foodName: this.makananInput.value,
  //    type : typeChck,
	  number : this.nomorInput.value,
      question : this.pertanyaanInput.value,
      point1: this.soal1Input.value,
      point2: this.soal2Input.value,
      point3: this.soal3Input.value,
      point4: this.soal4Input.value,
      answer : this.jawabanInput.value
    }).then(function(data) {
      // Clear message text field and SEND button state.
      HeroesApp.resetMaterialTextfield(this.pertanyaanInput);
      this.toggleButton();
    }.bind(this)).catch(function(error) {
      console.error('Error writing new message to Firebase Database', error);
    });
  }
};

// Sets the URL of the given img element with the URL of the image stored in Cloud Storage.
// FriendlyChat.prototype.setImageUrl = function(imageUri, imgElement) {
//   if (imageUri.startsWith('gs://')) {
//     imgElement.src = FriendlyChat.LOADING_IMAGE_URL; // Display a loading image first.
//     this.storage.refFromURL(imageUri).getMetadata().then(function(metadata) {
//       imgElement.src = metadata.downloadURLs[0];
//     });
//   } else {
//     imgElement.src = imageUri;
//   }
// };

// Saves a new message containing an image URI in Firebase.
// This first saves the image in Firebase storage.
// FriendlyChat.prototype.saveImageMessage = function(event) {
//   event.preventDefault();
//   var file = event.target.files[0];
//
//   this.imageForm.reset();
//
//   if (!file.type.match('image.*')) {
//     var data = {
//       message: 'You can only share images',
//       timeout: 2000
//     };
//     this.signInSnackbar.MaterialSnackbar.showSnackbar(data);
//     return;
//   }

//   if (this.checkSignedInWithMessage()) {
//
//     var currentUser = this.auth.currentUser;
//     this.messagesRef.push({
//       name: currentUser.displayName,
//       imageUrl: FriendlyChat.LOADING_IMAGE_URL,
//       photoUrl: currentUser.photoURL || '/images/profile_placeholder.png'
//     }).then(function(data) {
//
//       var filePath = currentUser.uid + '/' + data.key + '/' + file.name;
//       return this.storage.ref(filePath).put(file).then(function(snapshot) {
//
//         var fullPath = snapshot.metadata.fullPath;
//         return data.update({imageUrl: this.storage.ref(fullPath).toString()});
//       }.bind(this));
//     }.bind(this)).catch(function(error) {
//       console.error('There was an error uploading a file to Cloud Storage:', error);
//     });
//   }
// };

// Signs-in Friendly Chat.
// FriendlyChat.prototype.signIn = function() {
//   var provider = new firebase.auth.GoogleAuthProvider();
//   this.auth.signInWithPopup(provider);
// };

// Signs-out of Friendly Chat.
// FriendlyChat.prototype.signOut = function() {
//   this.auth.signOut();
// };

// Triggers when the auth state change for instance when the user signs-in or signs-out.
// FriendlyChat.prototype.onAuthStateChanged = function(user) {
//   if (user) {
//     var profilePicUrl = user.photoURL;
//     var userName = user.displayName;
//
//     this.userPic.style.backgroundImage = 'url(' + (profilePicUrl || '/images/profile_placeholder.png') + ')';
//     this.userName.textContent = userName;
//
//     this.userName.removeAttribute('hidden');
//     this.userPic.removeAttribute('hidden');
//     this.signOutButton.removeAttribute('hidden');
//
//     this.signInButton.setAttribute('hidden', 'true');
//
//     this.loadMessages();
//
//     this.saveMessagingDeviceToken();
//   } else {
//     this.userName.setAttribute('hidden', 'true');
//     this.userPic.setAttribute('hidden', 'true');
//     this.signOutButton.setAttribute('hidden', 'true');
//
//     this.signInButton.removeAttribute('hidden');
//   }
// };

// Returns true if user is signed-in. Otherwise false and displays a message.
// FriendlyChat.prototype.checkSignedInWithMessage = function() {
//   if (this.auth.currentUser) {
//     return true;
//   }
//
//   var data = {
//     message: 'You must sign-in first',
//     timeout: 2000
//   };
//   this.signInSnackbar.MaterialSnackbar.showSnackbar(data);
//   return false;
// };

// Saves the messaging device token to the datastore.
HeroesApp.prototype.saveMessagingDeviceToken = function() {
  firebase.messaging().getToken().then(function(currentToken) {
    if (currentToken) {
      console.log('Got FCM device token:', currentToken);
      // Saving the Device Token to the datastore.
      firebase.database().ref('/fcmTokens').child(currentToken)
          .set(firebase.auth().currentUser.uid);
    } else {
      // Need to request permissions to show notifications.
      this.requestNotificationsPermissions();
    }
  }.bind(this)).catch(function(error){
    console.error('Unable to get messaging token.', error);
  });
};

// Requests permissions to show notifications.
HeroesApp.prototype.requestNotificationsPermissions = function() {
  console.log('Requesting notifications permission...');
  firebase.messaging().requestPermission().then(function() {
    // Notification permission granted.
    this.saveMessagingDeviceToken();
  }.bind(this)).catch(function(error) {
    console.error('Unable to get permission to notify.', error);
  });
};

// Resets the given MaterialTextField.
HeroesApp.resetMaterialTextfield = function(element) {
  element.value = '';
  element.parentNode.MaterialTextfield.boundUpdateClassesHandler();
};

HeroesApp.prototype.toggleButton = function() {
  if (this.messageInput.value) {
    this.submitButton.removeAttribute('disabled');
  } else {
    this.submitButton.setAttribute('disabled', 'true');
  }
};

// Checks that the Firebase SDK has been correctly setup and configured.
HeroesApp.prototype.checkSetup = function() {
  if (!window.firebase || !(firebase.app instanceof Function) || !window.config) {
    window.alert('You have not configured and imported the Firebase SDK. ' +
        'Make sure you go through the codelab setup instructions.');
  } else if (config.storageBucket === '') {
    window.alert('Your Cloud Storage bucket has not been enabled. Sorry about that. This is ' +
        'actually a Firebase bug that occurs rarely. ' +
        'Please go and re-generate the Firebase initialisation snippet (step 4 of the codelab) ' +
        'and make sure the storageBucket attribute is not empty. ' +
        'You may also need to visit the Storage tab and paste the name of your bucket which is ' +
        'displayed there.');
  }
};

window.onload = function() {
  window.heroesApp = new HeroesApp();
};
