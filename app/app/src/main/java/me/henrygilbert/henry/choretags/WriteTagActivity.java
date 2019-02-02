package me.henrygilbert.henry.choretags;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;

public class WriteTagActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_write_tag);

        String taskID = getIntent().getExtras().getString("taskID");
        Log.d("CHT", "onCreate: " + taskID);
    }
}
