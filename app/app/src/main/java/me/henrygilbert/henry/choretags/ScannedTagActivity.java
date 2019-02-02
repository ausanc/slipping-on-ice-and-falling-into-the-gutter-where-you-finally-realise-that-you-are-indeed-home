package me.henrygilbert.henry.choretags;

import android.nfc.NdefMessage;
import android.nfc.NfcAdapter;
import android.os.Handler;
import android.os.Parcelable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class ScannedTagActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scanned_tag);

        // runs when opened by tag
        if (NfcAdapter.ACTION_NDEF_DISCOVERED.equals(getIntent().getAction())) {

            Parcelable[] rawMessages =
                    getIntent().getParcelableArrayExtra(NfcAdapter.EXTRA_NDEF_MESSAGES);
            if (rawMessages != null) {
                NdefMessage[] messages = new NdefMessage[rawMessages.length];
                for (int i = 0; i < rawMessages.length; i++) {
                    messages[i] = (NdefMessage) rawMessages[i];
                }
                // Process the messages array.
                if (messages.length > 0){
                    String taskID = (new String(messages[0].getRecords()[0].getPayload())).substring(3);
                    String user_id = "1";
                    String url = "http://10.2.114.250/api/complete/"+user_id+"/"+taskID;
                    Log.d("CHT", "onCreate: url made: " + url);

                    contactURL(url);

                } else {
                    Toast toast = Toast.makeText(getApplicationContext(),
                            "NO MESSAGES FOUND: ",
                            Toast.LENGTH_SHORT);
                    toast.show();
                }


            }
        } else {
            contactURL("http://google.com");
        }
    }

    private void contactURL(String url){
        final TextView mTextView = findViewById(R.id.infoLabel);

        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(this);

        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        mTextView.setText("Task complete!");
                        Handler handler = new Handler();
                        handler.postDelayed(new Runnable() {
                            public void run() {
                                finish();
                            }
                        }, 2000);
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                mTextView.setText("Sorry, completion failed!");
                Handler handler = new Handler();
                handler.postDelayed(new Runnable() {
                    public void run() {
                        finish();
                    }
                }, 2000);
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
    }
}
